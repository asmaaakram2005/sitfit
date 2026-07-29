from google import genai

from app.config import settings
from app.prompts.system_prompt import SYSTEM_PROMPT
from app.rag.retriever import get_retriever


# Create Gemini client
client = genai.Client(api_key=settings.GOOGLE_API_KEY)

# Load retriever once
try:
    retriever = get_retriever()
except Exception:
    retriever = None


def ask_chatbot(question: str) -> str:
    """
    Answer user questions using RAG + Gemini.
    """
    global retriever

    # Check if the question is empty
    if not question.strip():
        return "Please enter a valid question."

    try:
        # Load retriever if not already loaded
        if retriever is None:
            retriever = get_retriever()

        # Retrieve relevant documents
        documents = retriever.invoke(question)

        # If nothing was found
        if not documents:
            return "I couldn't find relevant information in the SitFit documentation."

        # Combine retrieved documents into one context
        context = "\n\n".join(
            document.page_content for document in documents
        )

        # Build the final prompt
        prompt = f"""
{SYSTEM_PROMPT}

Context:
{context}

Question:
{question}
"""

        # Generate answer using Gemini
        response = client.models.generate_content(
            model="gemini-3.5-flash",
            contents=prompt,
        )

        return response.text or "No response generated."

    except Exception as e:
        return f"Error: {str(e)}"