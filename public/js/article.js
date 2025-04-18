// script.js
function formatText(type) {
    const textarea = document.getElementById("article");
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const selected = textarea.value.slice(start, end);
    let formatted = selected;
  
    if (type === "bold") {
      formatted = `<strong>${selected}</strong>`;
    } else if (type === "highlight") {
      formatted = `<mark>${selected}</mark>`;
    }
  
    textarea.setRangeText(formatted, start, end, "end");
  }
  
  function clearText() {
    const textarea = document.getElementById("article");
    if (confirm("Are you sure you want to clear the article?")) {
      textarea.value = "";
    }
  }
  
  function submitArticle() {
    const content = document.getElementById("article").value.trim();
    if (!content) {
      alert("Please write something before submitting.");
      return;
    }
  
    alert("Article submitted!\n\n" + content);
  }
  