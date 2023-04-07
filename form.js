async function submitForm(event) {
  event.preventDefault(); // отключаем перезагрузку/перенаправление страницы
  try {
    // Формируем запрос
    console.log(new FormData(event.target));
    const response = await fetch(event.target.action, {
      method: "POST",
      body: new FormData(event.target),
    });
    // проверяем, что ответ есть
    if (!response.ok)
      throw `Ошибка при обращении к серверу: ${response.status}`;
    // проверяем, что ответ действительно JSON
    const contentType = response.headers.get("content-type");
    if (!contentType || !contentType.includes("application/json")) {
      throw "Ошибка обработки. Ответ не JSON";
    }
    // обрабатываем запрос
    const json = await response.json();
    if (json.result === "success") {
      // в случае успеха
      alert(json.info);
    } else {
      // в случае ошибки
      console.log(json);
      throw json.info;
    }
  } catch (error) {
    // обработка ошибки
    alert(error);
  }
}

// // Вибираємо форму та поля форми
// const form = document.querySelector("form");
// const firstName = document.querySelector("#first-name");
// const lastName = document.querySelector("#last-name");
// const phoneNumber = document.querySelector("#phone-number");
// const email = document.querySelector("#email");
// const businessName = document.querySelector("#business-name");
// const businessAddress1 = document.querySelector("#business-address-1");
// const businessAddress2 = document.querySelector("#business-address-2");
// const city = document.querySelector("#city");
// const stateOrProvince = document.querySelector("#state-or-province");
// const country = document.querySelector("#country");
// const zipOrPostalCode = document.querySelector("#zip-or-postal-code");
// const yearsInBusiness = document.querySelector("#years-in-business");
// const taxId = document.querySelector("#tax-id");
// const website = document.querySelector("#website");
// const otherBrands = document.querySelector("#other-brands");
// const additionalInformation = document.querySelector("#additional-information");

// // Додаємо обробник події для надсилання форми на сервер
// form.addEventListener("submit", function (event) {
//   event.preventDefault(); // Зупиняємо дію за замовчуванням, щоб сторінка не перезавантажувалася

//   // Збираємо дані з форми у форматі JSON
//   const formData = JSON.stringify({
//     firstName: firstName.value,
//     lastName: lastName.value,
//     phoneNumber: phoneNumber.value,
//     email: email.value,
//     businessName: businessName.value,
//     businessAddress1: businessAddress1.value,
//     businessAddress2: businessAddress2.value,
//     city: city.value,
//     stateOrProvince: stateOrProvince.value,
//     country: country.value,
//     zipOrPostalCode: zipOrPostalCode.value,
//     yearsInBusiness: yearsInBusiness.value,
//     taxId: taxId.value,
//     website: website.value,
//     otherBrands: otherBrands.value,
//     additionalInformation: additionalInformation.value,
//   });

//   // Створюємо AJAX-запит і надсилаємо дані на сервер
//   const xhr = new XMLHttpRequest();
//   xhr.open("POST", "send.php");
//   xhr.setRequestHeader("Content-Type", "application/json");
//   xhr.onload = function () {
//     if (xhr.status === 200) {
//       console.log("Дані успішно надіслані");
//     } else {
//       console.log("Сталася помилка. Спробуйте ще раз");
//     }
//   };
//   xhr.send(formData);
// });
