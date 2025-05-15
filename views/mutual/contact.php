<link rel="stylesheet" href="../../public/css/contact.css" />

<div class="contact card mt-5 mx-auto" style="max-width: 500px;">
  <h1 class="title">Contact Teacher</h1>
  <p class="subtitle">You can email your teacher directly.</p>
  <div class="buttons">
    <a href="mailto:<?= $teacher['email'] ?>?subject=Question%20about%20the%20lesson" class="email-btn btn btn-primary">
      Send Email
    </a>
  </div>
</div>