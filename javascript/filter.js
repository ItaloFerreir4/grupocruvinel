const filterYear = document.querySelector('.filter[data-filter="year"]');
const filterMonth = document.querySelector('.filter[data-filter="month"]');
const filterCategory = document.querySelector(
  '.filter[data-filter="category"]'
);

function setActiveClasses() {
  const urlParams = new URLSearchParams(window.location.search);
  const sessionCategory = urlParams.get("c");
  const sessionTag = sessionStorage.getItem("t");
  const sessionYear = sessionStorage.getItem("y");
  const sessionMonth = sessionStorage.getItem("m");

  const filterYearButtons = document.querySelectorAll(
    '.filter[data-filter="year"] button'
  );
  const filterMonthButtons = document.querySelectorAll(
    '.filter[data-filter="month"] button'
  );
  const filterCategoryButtons = document.querySelectorAll(
    '.filter[data-filter="category"] > *'
  );
  const filterTagButtons = document.querySelectorAll(
    ".tag-filter .buttons > button"
  );

  if (filterYearButtons.length > 0) {
    if (sessionYear !== "") {
      filterYearButtons.forEach((element) => {
        if (element.dataset.year === sessionYear) {
          element.classList.add("active");
        } else {
          element.classList.remove("active");
        }
      });
    } else {
      filterYearButtons[0].classList.add("active");
    }
  }

  if (filterMonthButtons.length > 0) {
    if (sessionMonth !== "") {
      filterMonthButtons.forEach((element) => {
        if (element.dataset.month === sessionMonth) {
          element.classList.add("active");
        } else {
          element.classList.remove("active");
        }
      });
    } else {
      filterMonthButtons.forEach((element) => {
        element.classList.remove("active");
      });
      filterMonthButtons[0].classList.add("active");
    }
  }

  if (filterCategoryButtons.length > 0) {
    if (sessionCategory !== null) {
      filterCategoryButtons.forEach((element) => {
        if (element.dataset.category === sessionCategory) {
          element.classList.add("active");
        } else {
          element.classList.remove("active");
        }
      });
    } else {
      filterCategoryButtons[0].classList.add("active");
    }
  }

  if (filterTagButtons.length > 0) {
    if (sessionTag !== "") {
      const filterTagButtons = document.querySelectorAll(
        ".tag-filter .buttons > button"
      );
      filterTagButtons.forEach((element) => {
        if (element.dataset.tag === sessionTag) {
          element.classList.add("active");
        } else {
          element.classList.remove("active");
        }
      });
    }
  }
}

function toggleActiveClassYear() {
  filterYear.classList.toggle("active");
}

function toggleActiveClassCategory() {
  filterCategory.classList.toggle("active");
}

function toggleActiveClassMonth() {
  filterMonth.classList.toggle("active");
}

function loadButtonsFunctionality() {
  const filterYearButtons = document.querySelectorAll(
    '.filter[data-filter="year"] button'
  );
  const filterMonthButtons = document.querySelectorAll(
    '.filter[data-filter="month"] button'
  );
  const filterCategoryButtons = document.querySelectorAll(
    '.filter[data-filter="category"] > *'
  );
  const filterTags = document.querySelectorAll(".tag-filter .buttons > button");

  if (filterYear) {
    filterYearButtons.forEach((element) => {
      element.removeEventListener("click", toggleActiveClassYear, true);
      element.setAttribute(
        "onclick",
        `filterByYear('${element.dataset.year}')`
      );
    });
  }

  if (filterMonth) {
    filterMonthButtons.forEach((element) => {
      element.removeEventListener("click", toggleActiveClassMonth);
      element.setAttribute(
        "onclick",
        `filterByMonth('${element.dataset.month}')`
      );
    });
  }

  if (filterCategory) {
    filterCategoryButtons.forEach((element) => {
      element.removeEventListener("click", toggleActiveClassCategory);
      element.setAttribute(
        "onclick",
        `filterByCategory("${element.dataset.category}", "${element.dataset.url}")`
      );
    });
  }

  if (filterTags) {
    filterTags.forEach((element) => {
      element.setAttribute("onclick", `filterByTag("${element.dataset.tag}")`);
    });
  }
}

function loadContent(listElements) {
  const title = document.querySelector(".page-title");
  const urlParams = new URLSearchParams(window.location.search);
  const sessionCategory = urlParams.get("c");
  const sessionTag = sessionStorage.getItem("t");
  const sessionYear = sessionStorage.getItem("y");
  const sessionMonth = sessionStorage.getItem("m");
  let visibleElements = 0;
  listElements.forEach((e) => {
    if (
      (typeof e.dataset.category === "undefined" ||
        sessionCategory === null ||
        e.dataset.category.includes(sessionCategory)) &&
      (typeof e.dataset.tag === "undefined" ||
        e.dataset.tag.includes(sessionTag)) &&
      (typeof e.dataset.year === "undefined" ||
        e.dataset.year.includes(sessionYear)) &&
      (typeof e.dataset.month === "undefined" ||
        e.dataset.month.includes(sessionMonth))
    ) {
      e.classList.add("filtered");
    } else {
      e.classList.remove("filtered");
    }

    e.style.display = "none";
  });

  const filteredElements = document.querySelectorAll(".filtered");
  filteredElements.forEach((element) => {
    if (visibleElements < maxVisibleElements) {
      visibleElements++;
      element.style.display = "block";
    }
  });
  if (title)
    title.textContent = title.textContent.replace(
      /\d+/,
      filteredElements.length
    );
  toggleLoadMoreButtonVisibility(listElements, visibleElements);
}

function loadMore(listElements, itemsToShow) {
  maxVisibleElements += itemsToShow;
  loadContent(listElements);
}

function toggleLoadMoreButtonVisibility(listElements, visibleElements) {
  const btnLoadMore = document.querySelector(".load-more");
  if (btnLoadMore) {
    if (
      visibleElements >= listElements.length ||
      visibleElements < maxVisibleElements
    ) {
      btnLoadMore.style.display = "none";
    } else {
      btnLoadMore.style.display = "block";
    }
  }
}

function filterByMonth(filter) {
  sessionStorage.setItem("m", filter);
  setActiveClasses();
  loadButtonsFunctionality();
  loadContent(listElements);
  filterMonth.classList.remove("active");
}

function filterByYear(filter) {
  sessionStorage.setItem("y", filter);
  setActiveClasses();
  loadButtonsFunctionality();
  loadContent(listElements);
  filterYear.classList.remove("active");
}

function filterByTag(filter) {
  sessionStorage.setItem("t", filter);
  setActiveClasses();
  loadButtonsFunctionality();
  loadContent(listElements);
}

function filterByCategory(filter, redirect) {
  let url = new URL(window.location.origin + "/grupocruvinel" + redirect);
  url.searchParams.set("c", filter);
  window.location.href = url.href;
}

window.addEventListener("DOMContentLoaded", () => {
  setActiveClasses();
  loadButtonsFunctionality();
  loadContent(listElements);
});
