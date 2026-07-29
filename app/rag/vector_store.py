import os
import shutil

from langchain_community.vectorstores import Chroma

from app.rag.embeddings import get_embedding_model

CHROMA_DB_PATH = "chroma_db"


def create_vector_store(chunks):
    """
    Create a new Chroma vector database.
    """

    embedding_model = get_embedding_model()

    vector_store = Chroma.from_texts(
        texts=chunks,
        embedding=embedding_model,
        persist_directory=CHROMA_DB_PATH,
    )

    return vector_store


def load_vector_store():
    """
    Load an existing Chroma vector database.
    """

    embedding_model = get_embedding_model()

    return Chroma(
        persist_directory=CHROMA_DB_PATH,
        embedding_function=embedding_model,
    )


def rebuild_vector_store(chunks):
    """
    Delete the old vector database and create a new one.
    """

    if os.path.exists(CHROMA_DB_PATH):
        shutil.rmtree(CHROMA_DB_PATH)

    return create_vector_store(chunks)