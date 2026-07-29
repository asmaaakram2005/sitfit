from fastapi import APIRouter

from app.models.schemas import ChatRequest, ChatResponse
from app.rag.chatbot import ask_chatbot


router = APIRouter()


@router.post("/chat", response_model=ChatResponse)
def chat(request: ChatRequest):
    """
    Chat endpoint for the SitFit chatbot.
    """

    answer = ask_chatbot(request.question)

    return ChatResponse(answer=answer)