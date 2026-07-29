from google import genai

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
            return "I couldn't find relevant information in the SitFit documentation."

        # Context
        context = "\n\n".join(
            document.page_content
            for document in documents
        )

        # Build conversation history
        conversation = ""

        if history:
            for message in history:

                if message.role == "user":
                    conversation += f"User: {message.content}\n"

                else:
                    conversation += f"Assistant: {message.content}\n"

        # Final Prompt
        prompt = f"""
{SYSTEM_PROMPT}

Conversation History:
{conversation}

Retrieved Context:
{context}

Current Question:
{question}
"""

        response = client.models.generate_content(
            model="gemini-3.5-flash",
            contents=prompt,
        )

        return response.text or "No response generated."

    except Exception as e:
        return f"Error: {str(e)}"