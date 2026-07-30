from fastapi import APIRouter, File, UploadFile, HTTPException

from app.rag.chatbot import ask_chatbot
from app.services.speech_to_text import speech_to_text

router = APIRouter()


@router.post("/voice-chat")
async def voice_chat(audio: UploadFile = File(...)):
    """
    Voice Chat Endpoint.
    """

    if audio.filename is None:
        raise HTTPException(
            status_code=400,
            detail="No audio file provided."
        )

    # Convert speech to text
    question = speech_to_text(audio)

    if not question.strip():
        raise HTTPException(
            status_code=400,
            detail="Could not recognize speech."
        )

    # Ask chatbot
    answer = ask_chatbot(question)

    return {
        "question": question,
        "answer": answer
    }