from typing import List, Literal
from pydantic import BaseModel


class Message(BaseModel):
    role: Literal["user", "assistant"]
    content: str


class ChatRequest(BaseModel):
    """
    User request model.
    """

    question: str
    history: List[Message] = []


class ChatResponse(BaseModel):
    """
    Chatbot response model.
    """

    answer: str