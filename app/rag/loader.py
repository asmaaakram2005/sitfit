import os
from docx import Document
from pypdf import PdfReader


def load_document(file_path: str) -> str:
    """
    Reads a document based on its extension (.docx, .txt, or .pdf) 
    and returns all text as a single string.
    """
    if not os.path.exists(file_path):
        return ""

    # 1. Word document (.docx)
    if file_path.endswith(".docx"):
        document = Document(file_path)
        paragraphs = []
        for paragraph in document.paragraphs:
            text = paragraph.text.strip()
            if text:
                paragraphs.append(text)
        return "\n".join(paragraphs)

    # 2. Plain text file (.txt)
    elif file_path.endswith(".txt"):
        with open(file_path, "r", encoding="utf-8") as f:
            return f.read().strip()

    # 3. PDF document (.pdf)
    elif file_path.endswith(".pdf"):
        reader = PdfReader(file_path)
        pdf_text = []
        for page in reader.pages:
            text = page.extract_text()
            if text:
                pdf_text.append(text.strip())
        return "\n".join(pdf_text)

    # Unsupported file extension
    return ""


def load_all_documents(folder_path: str) -> str:
    """
    Reads all supported documents (.docx, .txt, .pdf) in a folder 
    and returns combined text.
    """
    all_text = []

    if not os.path.exists(folder_path):
        return ""

    for file_name in os.listdir(folder_path):
        file_path = os.path.join(folder_path, file_name)

        # Check if it is a file and not a directory
        if os.path.isfile(file_path):
            text = load_document(file_path)
            if text:
                all_text.append(text)

    return "\n\n".join(all_text)