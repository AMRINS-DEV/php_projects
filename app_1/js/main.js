const handllogin = () => {
  const form = document.querySelector("#form");
  const submit = document.querySelector('[name="submitLogin"]');

  if(submit) {
    submit.addEventListener("click", login);
  }

  function login() {
    const email = form.querySelector('[name="user_email"]');
    const password = form.querySelector('[name="user_password"]');

    const body = {
      user_email: email.value,
      user_password: password.value,
    };

    fetch("/auth",
    {
      method: "POST",
      body: JSON.stringify(body),
    })
      .then((res) => res.json())
      .then((res) =>
      {
        if(res.success) {
            window.location.assign('/dashboard')
        } else {
          alert("User Login is Wrong")
        }
      })
  }
};
handllogin();
