(function () {
  const list = document.querySelector(".faq__items");
  if (!list) return;

  const col1 = document.getElementById("faq-col-1");
  const col2 = document.getElementById("faq-col-2");
  const items = Array.from(list.querySelectorAll(".faq__item"));

  function orderItems() {
    const isMobile = window.innerWidth < 768;

    if (isMobile) {
      col1.hidden = true;
      col2.hidden = true;
      items.forEach((item) => list.appendChild(item));
    } else {
      col1.hidden = false;
      col2.hidden = false;
      col1.replaceChildren();
      col2.replaceChildren();
      items.forEach((item, i) => {
        (i % 2 === 0 ? col1 : col2).appendChild(item);
      });
    }
  }

  orderItems();

  let resizeTimer;
  window.addEventListener("resize", function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(orderItems, 150);
  });
})();
