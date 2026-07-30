import os
import tempfile

from google import genai

from app.config import settings


client = genai.Client(api_key=settings.GOOGLE_API_KEY)


def speech_to_text(audio_file) -> str:
    """
    Convert an uploaded audio file to text using Gemini.
    """

    # Save uploaded audio temporarily
    suffix = os.path.splitext(audio_file.filename)[1]

    with tempfile.NamedTemporaryFile(delete=False, suffix=suffix) as temp_file:
        temp_file.write(audio_file.file.read())
        temp_path = temp_file.name

    try:
        uploaded_file = client.files.upload(file=temp_path)

        response = client.models.generate_content(
            model="gemini-3.5-flash",
            contents=[
                "Transcribe this audio exactly as text.",
                uploaded_file
            ]
        )

        return response.text or ""

    finally:
        if os.path.exists(temp_path):
            os.remove(temp_path)