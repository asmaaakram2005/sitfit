from app.rag.loader import load_document
from app.rag.splitter import split_text
from app.rag.vector_store import rebuild_vector_store

print("1. Loading sitfit.docx...")
text = load_document("docs/sitfit.docx")

print("2. Splitting text...")
chunks = split_text(text)
print(f"Total Chunks: {len(chunks)}")

print("3. Saving to ChromaDB...")
rebuild_vector_store(chunks)

print("Done! Vector Store is ready.")
