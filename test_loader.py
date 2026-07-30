import os

from app.rag.loader import load_document
from app.rag.splitter import split_text
from app.rag.vector_store import rebuild_vector_store

all_chunks = []

print("Loading documents...")

for filename in os.listdir("docs"):
    file_path = os.path.join("docs", filename)

    if os.path.isfile(file_path):
        print(f"Loading {filename}...")

        text = load_document(file_path)

        chunks = split_text(text)

        all_chunks.extend(chunks)

print(f"\nTotal Chunks: {len(all_chunks)}")

print("Building ChromaDB...")
rebuild_vector_store(all_chunks)

print("Done! Vector Store is ready.")