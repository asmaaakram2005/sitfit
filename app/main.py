from fastapi import FastAPI

from app.api.chat import router as chat_router
from app.api.voice import router as voice_router

app = FastAPI(
    title="SitFit RAG Chatbot API",
    version="1.0.0",
    description="RAG-powered chatbot for SitFit."
)


@app.get("/")
def root():
    """
    Root endpoint.
    """
    return {
        "message": "Welcome to SitFit Chatbot API!"
    }


# Register chat routes
app.include_router(chat_router)

# Register voice routes
app.include_router(voice_router)