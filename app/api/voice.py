from fastapi import APIRouter, File, Form, UploadFile, HTTPException
from app.models.schemas import VoiceChatResponse
from app.rag.chatbot import ask_chatbot
from app.services.speech_to_text import speech_to_text

router = APIRouter()


@router.post("/voice-chat", response_model=VoiceChatResponse)
async def voice_chat(
    user_id: str = Form(...),
    audio: UploadFile = File(...)
):
    """
    Voice Chat Endpoint for Laravel Integration.
    Accepts audio file and user_id via Form-Data.
    """
    if audio.filename is None:
        raise HTTPException(status_code=400, detail="No audio file provided.")

    # Convert speech to text locally using Whisper
    question = speech_to_text(audio)

    if not question.strip():
        raise HTTPException(status_code=400, detail="Could not recognize speech from audio.")

    # Ask chatbot
    answer = ask_chatbot(question)

    return VoiceChatResponse(
        user_id=user_id,
        answer=answer
    )