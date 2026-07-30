from fastapi import APIRouter
from app.models.schemas import ChatRequest, ChatResponse
from app.rag.chatbot import ask_chatbot

router = APIRouter()


@router.post("/chat", response_model=ChatResponse)
def chat(request: ChatRequest):
    """
    Text Chat Endpoint for Laravel Integration.
    """
    answer = ask_chatbot(
    request.user_id,
    request.question,
    request.history,
)

    return ChatResponse(
        user_id=request.user_id,
        answer=answer
    )