import time

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


def ask_chatbot(
    user_id: str,
    question: str,
    history=None,
) -> str:
    """
    Answer user questions using RAG + Gemini.
    """

    global retriever

    if not question.strip():
        return "Please enter a valid question."

    try:
        if retriever is None:
            retriever = get_retriever()

        # Retrieve relevant documents
        documents = retriever.invoke(question)

        if not documents:
            return "عذراً، لم أجد معلومات متعلقة بهذا السؤال في وثائق SitFit."

        context = "\n\n".join(doc.page_content for doc in documents)

        # Last 6 messages only
        conversation_context = ""

        if history:
            for msg in history[-6:]:
                role = "User" if msg.role == "user" else "Assistant"
                conversation_context += f"{role}: {msg.content}\n"

        user_prompt = f"""
User ID:
{user_id}

Conversation History:
{conversation_context if conversation_context else "None"}

Retrieved Documentation:
{context}

Current Question:
{question}
"""

        # Retry if Gemini is busy
        for _ in range(3):
            try:
                response = client.models.generate_content(
                    model="gemini-flash-latest",
                    contents=user_prompt,
                    config=types.GenerateContentConfig(
                        system_instruction=SYSTEM_PROMPT,
                        temperature=0.3,
                    ),
                )

                return response.text or "لم يتم إنشاء إجابة."

            except Exception as e:
                if "503" in str(e):
                    time.sleep(2)
                    continue
                raise

        return "Gemini is currently busy. Please try again."

    except Exception as e:
        return f"حدث خطأ أثناء معالجة الطلب: {str(e)}"