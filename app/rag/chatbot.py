from google import genai
from google.genai import types

from app.config import settings
from app.prompts.system_prompt import SYSTEM_PROMPT
from app.rag.retriever import get_retriever

client = genai.Client(api_key=settings.GOOGLE_API_KEY)

try:
    retriever = get_retriever()
except Exception:
    retriever = None


def ask_chatbot(question: str, history=None) -> str:
    """
    Answer user questions using RAG + Gemini with System Instructions.
    """
    global retriever

    if not question.strip():
        return "Please enter a valid question."

    try:
        if retriever is None:
            retriever = get_retriever()

        # 1. Retrieve relevant documents from ChromaDB
        documents = retriever.invoke(question)

        if not documents:
            return "عذراً، لم أجد معلومات متعلقة بهذا السؤال في وثائق SitFit."

        context = "\n\n".join(doc.page_content for doc in documents)

        # 2. Limit history to last 6 messages to optimize token usage & preserve recent context
        conversation_context = ""
        if history:
            recent_history = history[-6:]
            for msg in recent_history:
                role_label = "User" if msg.role == "user" else "Assistant"
                conversation_context += f"{role_label}: {msg.content}\n"

        # 3. Construct current query payload
        user_prompt = f"""
Conversation History:
{conversation_context if conversation_context else "None"}

Retrieved Documentation Context:
{context}

Current Question:
{question}
"""

        # 4. Generate Content using system_instruction and standard gemini-1.5-flash model
        response = client.models.generate_content(
            model="gemini-1.5-flash",
            contents=user_prompt,
            config=types.GenerateContentConfig(
                system_instruction=SYSTEM_PROMPT,
                temperature=0.3,
            )
        )

        return response.text or "لم يتم إنشاء إجابة."

    except Exception as e:
        return f"حدث خطأ أثناء معالجة الطلب: {str(e)}"