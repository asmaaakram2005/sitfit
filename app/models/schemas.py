from typing import List, Literal, Optional
from pydantic import BaseModel, Field


class Message(BaseModel):
    role: Literal["user", "assistant"]
    content: str


class ChatRequest(BaseModel):
    user_id: str = Field(..., description="Unique Identifier for the user from Laravel DB")
    question: str
    history: Optional[List[Message]] = Field(default_factory=list)


class ChatResponse(BaseModel):
    user_id: str
    
    answer: str


class VoiceChatResponse(BaseModel):
    user_id: str
   
    answer: str