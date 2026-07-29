# 🪑 SitFit AI Backend

> AI-powered Retrieval-Augmented Generation (RAG) backend for the **SitFit Smart Back Support** system.

---

## 📖 Overview

This repository contains the **AI Backend Service** of the SitFit project.

The backend provides an intelligent chatbot that answers users' questions about the SitFit product using **Retrieval-Augmented Generation (RAG)**.

Instead of relying only on a Large Language Model, the chatbot retrieves information from the official SitFit documentation before generating an answer, ensuring more accurate and reliable responses.

The backend is designed to be consumed by:

- 📱 Flutter Mobile Application
- 🌐 Website Frontend
- 🔌 Any client capable of making HTTP requests

---

# 🏗 Project Architecture

```text
                 Flutter App
                      │
                      │
               Website Frontend
                      │
                      ▼
                FastAPI Backend
                      │
                      ▼
              POST /chat Endpoint
                      │
                      ▼
                  RAG Pipeline
                      │
        ┌─────────────┴─────────────┐
        │                           │
        ▼                           ▼
     Retriever                ChromaDB
        │                           │
        └─────────────┬─────────────┘
                      ▼
          Relevant Documentation
                      │
                      ▼
              Google Gemini 3.5 Flash
                      │
                      ▼
                Final AI Response
```

---

# 🚀 Features

- Retrieval-Augmented Generation (RAG)
- Google Gemini 3.5 Flash Integration
- Chroma Vector Database
- HuggingFace Multilingual Embeddings
- FastAPI REST API
- Conversation History Support
- Arabic & English Support
- PDF / DOCX / TXT Knowledge Base
- Context-Grounded Responses
- Easy Knowledge Base Updates

---

# 📂 Project Structure

```text
SITFIT/
│
├── app/
│   ├── api/
│   │   └── chat.py
│   │
│   ├── models/
│   │   └── schemas.py
│   │
│   ├── prompts/
│   │   └── system_prompt.py
│   │
│   ├── rag/
│   │   ├── chatbot.py
│   │   ├── embeddings.py
│   │   ├── loader.py
│   │   ├── retriever.py
│   │   ├── splitter.py
│   │   └── vector_store.py
│   │
│   ├── config.py
│   └── main.py
│
├── docs/
│
├── chroma_db/
│
├── requirements.txt
├── README.md
├── .env.example
└── test_loader.py
```

---

# ⚙ Installation

Clone the repository

```bash
git clone https://github.com/your-repository.git

cd SITFIT
```

Create Virtual Environment

Windows

```bash
python -m venv venv

venv\Scripts\activate
```

Linux / macOS

```bash
python3 -m venv venv

source venv/bin/activate
```

Install Dependencies

```bash
pip install -r requirements.txt
```

---

# 🔑 Environment Variables

Create a `.env` file.

```env
GOOGLE_API_KEY=YOUR_API_KEY
```

---

# 📚 Building the Knowledge Base

Before running the server, build the vector database.

```bash
python test_loader.py
```

This script will:

- Read every document inside the `docs/` folder.
- Split the documents into chunks.
- Generate embeddings.
- Build the Chroma Vector Database.

Whenever the documentation changes, run the same command again.

---

# ▶ Running the Server

```bash
uvicorn app.main:app --reload
```

FastAPI will start at

```
http://127.0.0.1:8000
```

Swagger Documentation

```
http://127.0.0.1:8000/docs
```

---

# 🧠 RAG Pipeline

```text
User Question

        │

        ▼

FastAPI

        │

        ▼

Retriever

        │

        ▼

ChromaDB

        │

        ▼

Relevant Chunks

        │

        ▼

SYSTEM PROMPT

        │

        ▼

Gemini 3.5 Flash

        │

        ▼

Answer
```

---

# 🌐 REST API

## POST /chat

### Request

```json
{
    "question":"Does SitFit fit any chair?"
}
```

or

```json
{
    "question":"What if it's wooden?",

    "history":[
        {
            "role":"user",
            "content":"Does SitFit fit any chair?"
        },
        {
            "role":"assistant",
            "content":"Yes, SitFit is designed to fit most chair types."
        }
    ]
}
```

---

### Response

```json
{
    "answer":"Yes, SitFit is compatible with most chair types..."
}
```

---

# 📱 Flutter Integration

The Flutter application communicates with the backend using the `/chat` endpoint.

The mobile application is responsible for:

- Displaying the chat interface.
- Sending user questions.
- Sending optional conversation history.
- Displaying chatbot responses.

The backend is responsible for:

- Retrieving relevant documentation.
- Searching the vector database.
- Building the prompt.
- Communicating with Gemini.
- Returning the final response.

No AI processing is performed inside the Flutter application.

---

# 💻 Website Integration

The website frontend uses the same REST API.

Responsibilities of the Website:

- Chat UI
- Sending user requests
- Displaying responses

Responsibilities of this Backend:

- AI Processing
- RAG Retrieval
- Gemini Communication
- Response Generation

---

# 📄 Knowledge Base

The chatbot answers only from the documents stored inside:

```
docs/
```

Supported file formats:

- PDF
- DOCX
- TXT

Whenever new documentation is added:

1. Place the files inside `docs/`
2. Run

```bash
python test_loader.py
```

3. Restart the server.

---

# 🛠 Tech Stack

- Python
- FastAPI
- LangChain
- ChromaDB
- Google Gemini 3.5 Flash
- HuggingFace Sentence Transformers
- Pydantic
- python-docx
- PyPDF

---

# 🤝 Team Integration

This repository is one module of the complete SitFit system.

Other project components communicate with this backend through REST APIs.

This backend can be consumed by:

- Flutter Mobile Application
- Website Frontend
- Future Desktop Applications
- External Services

---

# 📌 Responsibilities of this Repository

This repository is responsible for:

- AI Chatbot
- Retrieval-Augmented Generation (RAG)
- Document Retrieval
- Vector Search
- Prompt Engineering
- Gemini Integration
- Conversation History
- REST API

This repository is **not responsible** for:

- Sensor AI
- Computer Vision
- Recommendation System
- AI Coach
- Flutter UI
- Website UI

---

# 🔮 Future Improvements

- Hybrid Search
- Streaming Responses
- Citation Support
- Admin Dashboard
- Knowledge Base Versioning
- Multi-Agent Support
- Authentication & Authorization

---

# 👥 SitFit Team

This repository represents the **AI Chatbot (RAG) module** within the SitFit project.

The complete SitFit system consists of:

- Sensor AI
- AI Chatbot (This Repository)
- Computer Vision
- AI Coach
- Recommendation System
- Gamification
- Flutter Application
- Website
