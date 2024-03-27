function scrollElemento(elemento) {
  let element = document.querySelector(elemento);
  element.scrollIntoView({ behavior: "smooth" });
}

function toggleElements() {
  const isDesktop = window.innerWidth >= 992; // Defina a largura mínima para desktop
  const desktopElements = document.querySelectorAll(".desktop");
  const mobileElements = document.querySelectorAll(".mobile");

  desktopElements.forEach((element) => {
    if (isDesktop) {
      element.classList.remove("hidden");
    } else {
      element.classList.add("hidden");
    }
  });

  mobileElements.forEach((element) => {
    if (!isDesktop) {
      element.classList.remove("hidden");
    } else {
      element.classList.add("hidden");
    }
  });
}

// Chame a função inicialmente e adicione um ouvinte de redimensionamento da janela
toggleElements();
window.addEventListener("resize", toggleElements);

function SubirTopo() {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}

function Compartilhar(rede) {
  const redeSelecionada = rede.getAttribute("title");

  // URL que você deseja compartilhar
  var url = window.location.href;

  if (redeSelecionada == "facebook") {
    window.open(
      "https://www.facebook.com/sharer/sharer.php?u=" +
        document.title +
        ": " +
        encodeURIComponent(url),
      "Compartilhar no Facebook",
      "width=600,height=400"
    );
  }
  if (redeSelecionada == "linkedin") {
    window.open(
      "https://www.linkedin.com/shareArticle?url=" +
        document.title +
        ": " +
        encodeURIComponent(url),
      "Compartilhar no LinkedIn",
      "width=600,height=400"
    );
  }
  if (redeSelecionada == "twitter") {
    window.open(
      "https://twitter.com/share?url=" +
        document.title +
        ": " +
        encodeURIComponent(url),
      "Compartilhar no Twitter",
      "width=600,height=400"
    );
  }
  if (redeSelecionada == "telegram") {
    window.open(
      "https://t.me/share/url?url=" +
        document.title +
        ": " +
        encodeURIComponent(url),
      "Compartilhar no Telegram",
      "width=600,height=400"
    );
  }
  if (redeSelecionada == "whatsapp") {
    window.open(
      "https://api.whatsapp.com/send?text=" +
        document.title +
        ": " +
        encodeURIComponent(url),
      "Compartilhar no WhatsApp",
      "width=600,height=400"
    );
  }
}

function PopUpVideo(idVideo) {
  const divPop = document.getElementById("popupVideo");
  const iframe = divPop.querySelector("iframe");

  divPop.classList.toggle("ativado");
  iframe.src = "https://www.youtube.com/embed/" + idVideo;
}

function PopUpPodcast(iframe) {
  const divPop = document.getElementById("popupPodcast");
  const div = divPop.querySelector(".podcast");

  divPop.classList.toggle("ativado");
  div.innerHTML = iframe;
}

function mascaraTel(telefone) {
  setTimeout(function () {
    var v = ajustaTel(telefone.value);
    if (v != telefone.value) {
      telefone.value = v;
    }
  }, 1);
}

function ajustaTel(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, "");
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
}

function EnviarFormulario(id) {
  const formulario = $("#formulario-" + id);
  const button = formulario.find("button")[0];
  const htmlBtn = button.innerHTML;
  const inputFields = formulario
    .find("input, textarea, select")
    .filter(function () {
      return $(this).attr("id") !== "conferirWhatsapp";
    });

  let hasEmptyField = false;

  toastr.options.timeOut = "3000";

  button.innerHTML = "Carregando...";
  button.style.pointerEvents = "none";

  inputFields.each(function () {
    const fieldType = $(this).attr("type");
    const fieldValue = $(this).val();

    $(this).removeClass("parsley-error");

    if (fieldValue === null || fieldValue.trim() === "") {
      hasEmptyField = true;
      $(this).addClass("parsley-error");
    } else if (fieldType === "checkbox" && !$(this).is(":checked")) {
      hasEmptyField = true;
      $(this).addClass("parsley-error");
    }
  });

  if (hasEmptyField) {
    toastr["error"]("Preencha todos os campos e aceite os termos!");

    button.style.pointerEvents = "auto";
    button.innerHTML = htmlBtn;
  } else {
    $.ajax({
      type: "POST",
      url: "http://localhost/grupocruvinel/backend/envio-formulario.php",
      data: $("#formulario-" + id).serialize(),
    }).done(function (data) {
      button.style.pointerEvents = "auto";
      button.innerHTML = htmlBtn;

      if (data) {
        const ebook = document.getElementById("linkEbook");

        if (ebook) {
          const link = ebook.value;

          let pattern = /file\/d\/(.*?)\//;
          let matches = link.match(pattern);

          if (matches) {
            let fileID = matches[1];
            let linkDownload =
              "https://drive.google.com/uc?export=download&id=" + fileID;

            window.open(linkDownload, "_blank");
          }
        }

        toastr["success"]("Email enviado com sucesso!");
      } else {
        toastr["error"]("Erro ao enviar!");
      }
    });
  }
}

function addContainerClassToDesktop(element) {
  const isDesktop = window.innerWidth >= 992; // Defina a largura mínima para desktop
  isDesktop
    ? element.classList.add("container")
    : element.classList.remove("container");
}

function addContainerClassToMobile(element) {
  const isMobile = window.innerWidth < 992;
  isMobile
    ? element.classList.add("container")
    : element.classList.remove("container");
}

function setTabsBackground() {
  const greyBackgroundTabs = document.querySelector(".tabs .background .grey");
  const whitebackgroundTabs = document.querySelector(
    ".tabs .background .white"
  );
  const tabs = document.querySelector(".tabs");
  const paddingTabs = parseInt(
    window.getComputedStyle(tabs).getPropertyValue("padding-bottom"),
    10
  ); //Pegar padding-bottom do elemento .tabs
  const contentTabCardHeight =
    document.querySelector(".tabs .content").offsetHeight; //pegar a altura da div .content

  greyBackgroundTabs.style.height = paddingTabs + contentTabCardHeight + "px";
  whitebackgroundTabs.style.height =
    greyBackgroundTabs.offsetHeight - 40 + "px"; //pegar a altura da div .content e do padding bottom do elemento .tabs
}

const acc = document.querySelectorAll(".accordion");
acc.forEach((element) => {
  element.children[0].addEventListener("click", function () {
    element.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
});

// Função para verificar o scroll
function handleScroll() {
  const header = document.querySelector("header");
  const logo = document.querySelector("header .logo");
  const menuMobile = document.querySelector("header .expand");

  if (header) {
    if (window.scrollY > 50) {

      header.style.backgroundColor = "#141414";
      logo.style.height = "70px";
      header.style.height = "90px";
      menuMobile.style.top = "90px";

    } else {

      header.style.backgroundColor = "transparent";
      logo.style.height = "85px";
      header.style.height = "115px";
      menuMobile.style.top = "115px";

    }
  }
}

function handleFooterMapOnMobile(footerIsOpen) {
  const links = document.querySelector(".map.mobile .links");
  footerIsOpen
    ? (links.style.maxHeight = "500px")
    : (links.style.maxHeight = "0px");
}

function padTo2Digits(num) {
  return num.toString().padStart(2, "0");
}

function formatDate(date) {
  return [
    padTo2Digits(date.getDate()),
    padTo2Digits(date.getMonth() + 1),
    date.getFullYear(),
  ].join("/");
}

const tabs = document.querySelector(".tabs");
const tabsContent = document.querySelector(".tabs .tabs-content");
const instagram = document.querySelector(".instagram");
const instagramActions = document.querySelector(".instagram .actions");
const others = document.querySelector(".others");
const bannerDate = document.querySelector(".date h2");
console.log(bannerDate);
let navIsOpen = false;
let footerIsOpen = false;

window.addEventListener("scroll", handleScroll);

window.addEventListener("resize", () => {
  if (tabs) addContainerClassToDesktop(tabsContent);
  if (instagram) {
    addContainerClassToDesktop(instagram);
    addContainerClassToMobile(instagramActions);
  }
  if (others) {
    addContainerClassToDesktop(others);
  }
});

window.addEventListener("DOMContentLoaded", () => {
  checkCookieConsent();

  /* colocar titulo no input do formulário */
  const tituloPaginas = document.querySelectorAll("#tituloPagina");

  if (tituloPaginas) {
    tituloPaginas.forEach((titulo) => {
      titulo.value = document.title;
    });
  }

  const isMobile = window.innerWidth < 992;
  const buttonMenu = document.querySelector("header button.menu");
  // const mapMobileButton = document.querySelector(".map.mobile > button");

  if (isMobile) {
    handleNavButtonsSizeOnMobile(navIsOpen);

    buttonMenu.addEventListener("click", () => {
      navIsOpen = !navIsOpen;
      handleNavButtonsSizeOnMobile(navIsOpen);
    });

    function handleNavButtonsSizeOnMobile(navIsOpen) {
      const expand = document.querySelector("nav .expand");
      navIsOpen
        ? (expand.style.maxHeight = "calc(100vh - 115px)")
        : (expand.style.maxHeight = "0");
    }
  }

  if (instagram) {
    addContainerClassToDesktop(instagram);
    addContainerClassToMobile(instagramActions);
  }
  if (tabs) {
    addContainerClassToDesktop(tabsContent);
    addTabsFunctionality();
    setTabsBackground();
  }
  if (others) {
    addContainerClassToDesktop(others);
  }
  if (bannerDate) {
    bannerDate.textContent = formatDate(new Date(bannerDate.textContent));
  }
});

// Função para definir um cookie
function setCookie(name, value, days) {
  let expires = "";
  if (days) {
    let date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + value + expires + "; path=/";
}

// Função para aceitar cookies
function acceptCookies() {
  const sectionCookie = document.querySelector(".section_cookie");
  setCookie("cookieConsent", "accepted", 30); // Define o cookie chamado "cookieConsent" como "accepted" com validade de 30 dias
  sectionCookie.classList.add("hidden");
}

// Verifica se o cookie de consentimento já foi aceito
function checkCookieConsent() {
  const sectionCookie = document.querySelector(".section_cookie");
  const cookieValue = getCookie("cookieConsent");

  if (cookieValue == "accepted") {
    sectionCookie.classList.add("hidden");
  } else {
    sectionCookie.classList.remove("hidden");
  }

  console.log(cookieValue);
  console.log(sectionCookie);
}

function getCookie(name) {
  var nameEQ = name + "=";
  var cookies = document.cookie.split(";");
  for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i];
    while (cookie.charAt(0) === " ")
      cookie = cookie.substring(1, cookie.length);
    if (cookie.indexOf(nameEQ) === 0)
      return cookie.substring(nameEQ.length, cookie.length);
  }
  return null;
}
