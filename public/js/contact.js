document.querySelector('.email-btn').onclick = () => {
    window.location.href = "mailto:teacher@example.com";
  };
  
  document.querySelector('.whatsapp-btn').onclick = () => {
    window.open("https://wa.me/201234567890", "_blank");
  };
  
  document.querySelector('.call-btn').onclick = () => {
    window.location.href = "tel:+201234567890";
  };
  