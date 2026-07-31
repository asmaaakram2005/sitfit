from app.rag.vector_store import load_vector_store


def get_retriever():
    """
    Load the vector database and create a retriever.
    """

    vector_store = load_vector_store()

    retriever = vector_store.as_retriever(
        search_type="similarity",
        search_kwargs={"k": 8}
    )

    return retriever