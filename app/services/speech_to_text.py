import os
import tempfile
from faster_whisper import WhisperModel

model = WhisperModel("base", device="cpu", compute_type="int8")


def speech_to_text(audio_file) -> str:
    """
    Convert audio to text locally using faster-whisper.
    """
    suffix = os.path.splitext(audio_file.filename)[1] or ".wav"

    with tempfile.NamedTemporaryFile(delete=False, suffix=suffix) as temp_file:
        temp_file.write(audio_file.file.read())
        temp_path = temp_file.name

    try:
        segments, _ = model.transcribe(temp_path, beam_size=5)
        text = " ".join([segment.text for segment in segments])
        return text.strip()

    finally:
        if os.path.exists(temp_path):
            os.remove(temp_path)