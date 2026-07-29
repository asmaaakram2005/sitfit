from pydantic import BaseModel


class ChatRequest(BaseModel):
    """
    User request model.
    """

    question: str


class ChatResponse(BaseModel):
    """
    Chatbot response model.
    """

    answer: str