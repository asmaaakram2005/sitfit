from langchain_community.embeddings import HuggingFaceEmbeddings


def get_embedding_model():
    """
    Load the embedding model.
    """

    embedding_model = HuggingFaceEmbeddings(
        model_name="sentence-transformers/paraphrase-multilingual-MiniLM-L12-v2" 
    )

    return embedding_model
