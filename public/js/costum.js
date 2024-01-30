
document.addEventListener("DOMContentLoaded", function () {
  // Tampilan Berita
  const iconKeluarga = document.querySelectorAll(".iconKeluarga");
  const descElements = document.querySelectorAll('.desc');
  const latestNewsElements = document.getElementById('latest-news');
  const colDetailBerita = document.querySelectorAll(".BeritaDetail");
  const padBerita = document.querySelectorAll(".Berita");
  const padContentDesc = document.querySelectorAll(".content-desc");

  //Tampilan Kepemerintahan
  const iconLembagaDesa = document.querySelectorAll(".iconLembagaDesa");
  const AnggotaLembaga = document.querySelectorAll(".AnggotaLembaga");

  //Tampilan Landing-Page
  var demografiElement = document.getElementById('Demografi');
  const beritaPengumuman = document.querySelector("#BeritaPengumuman");
  const tentangDesa = document.querySelector("#MengenaiDesa");
  const APBDesa = document.querySelector("#Apbdes");
  const penduduk = document.querySelector("#DataKependudukan");

  const angkaJumlahPenduduk = document.querySelectorAll(".card-demografi-penduduk__jumlah");
  const titleJumlahPenduduk = document.querySelectorAll(".card-demografi-penduduk__info");

  const layoutCard = document.querySelectorAll(".layout-card");
  const cardDanaMasuk = document.querySelectorAll(".card-dana-masuk");
  const cardDanaKeluar = document.querySelectorAll(".card-dana-keluar");

  const detailPembelanjaan = document.querySelectorAll(".detailPembelanjaan");

  //Tampilan Dashboard
  const textDashboard = document.querySelectorAll(".textDashboard");
  const textDashboardBottom = document.querySelectorAll(".textDashboardBottom");

  const layoutWelcome = document.querySelectorAll(".layoutWelcome");
  const layoutBaganWelcome = document.querySelectorAll(".layoutBaganWelcome");
  const textheadDash = document.querySelectorAll(".headDash");

  const layoutBtnPengaduan = document.querySelectorAll(".layoutBtnPengaduan")
  const btnPengaduan = document.querySelectorAll(".btnPengaduan")

  //Table Tampilan,layout, dan text
  const textTabelTop = document.querySelectorAll(".textTabelTop")
  const textTabel = document.querySelectorAll(".textTable")

  //Tampilan header username
  const usernameLargeScreen = document.getElementById("usernameLargeScreen");
  const usernameSmallScreen = document.getElementById("usernameSmallScreen");

  //Tampilan card pada Pengelolaan Data Kependudukan
  const LayoutCardKependudukan = document.querySelectorAll(".LayoutCardKependudukan");
  const layoutInsideCardKependudukan = document.querySelectorAll(".layoutInsideCardKependudukan");
  const iconCardKependudukan = document.querySelectorAll(".iconCardKependudukan");

  // Gambar Visi & Misi large dan small screen
  const imageLargeScreen = document.getElementById("img_Largescreen");
  const imageSmallScreen = document.getElementById("img_Smallscreen");

  //gambar struktur anggota desa pada halaman kepemerintahan
  const cardimgStruktur = document.querySelectorAll(".card-imgStruktur");

  //Layout col pada pembuatan surat online
  const colPembuatanSurat__Online = document.querySelectorAll(".layout__surat");

  // Check viewport width and apply styles accordingly
  function checkViewportWidth() {
    if (window.innerWidth <= 450) {
      applyStylesForMobileScreens()
    }
    else if (window.innerWidth <= 1200) {
      applyStylesForSmallerScreens();
    }
    else {
      applyStylesForLargerScreens();
    }
  }

  // Apply styles for smaller screens
  function applyStylesForMobileScreens() {
    removeDescElementsForMobile()
    removeLatestNewsElement();
    adjustColumnWidths();
    addContainerClassToElement(demografiElement);
    addContainerClassToElement(beritaPengumuman);
    addContainerClassToElement(tentangDesa);
    removeElement(usernameLargeScreen);
    removeElement(imageLargeScreen);

    // ... Add more styles for smaller screens if needed
  }
  // Apply styles for smaller screens
  function applyStylesForSmallerScreens() {
    removeDescElements();
    removeLatestNewsElement();
    adjustColumnWidths();
    addContainerClassToElement(demografiElement);
    addContainerClassToElement(beritaPengumuman);
    addContainerClassToElement(tentangDesa);
    adjustMobile();
    removeElement(usernameSmallScreen);
    removeElement(imageSmallScreen);
    // ... Add more styles for smaller screens if needed
  }


  // Apply styles for larger screens
  function applyStylesForLargerScreens() {
    removeContainerClassFromElement(demografiElement);
    removeElement(imageSmallScreen);
  }

  function adjustMobile() {

    // Lembaga dan organisasi untuk tampilan tablet
    iconLembagaDesa.forEach(function (element) {
      element.classList.remove("col-md-8");
      element.classList.add("col-6");
    });
    AnggotaLembaga.forEach(function (element) {
      element.classList.remove("col-md-4");
      element.classList.add("col-6");
    });

  }

  // Remove description elements
  function removeDescElements() {
    //Tampilan Berita
    descElements.forEach(function (element) {
      element.remove();
    });

    padContentDesc.forEach(function (element) {
      element.classList.remove("px-5");
      element.classList.add("px-2");
    });

    padBerita.forEach(function (element) {
      element.classList.add("py-2");
    });


    // Dashboard Tampilan Tablet
    textDashboard.forEach(function (element) {
      element.classList.remove("text-base");
    });
    textDashboardBottom.forEach(function (element) {
      element.classList.remove("text-base");

      element.style.lineHeight = '1rem';
    });

    btnPengaduan.forEach(function (element) {
      element.classList.remove("px-5");
      element.classList.add("px-4");
    });

    //Tabel text
    textTabel.forEach(function (element) {
      element.style.fontSize = '12px';
    });

    //Gambar Struktur Organisasi
    cardimgStruktur.forEach(function (element) {
      element.classList.remove("col-8");
      element.classList.add("col-12");
    });

  }

  function removeDescElementsForMobile() {
    descElements.forEach(function (element) {
      element.remove();
    });

    padContentDesc.forEach(function (element) {
      element.classList.remove("px-5");
      element.classList.add("px-2");
    });


    // Dashboard Tampilan Mobile
    textDashboard.forEach(function (element) {
      element.classList.remove("text-lg");
      element.classList.remove("text-base");

      element.classList.remove("h6")

    });
    textDashboardBottom.forEach(function (element) {
      element.classList.remove("text-base");
      element.classList.add("mt-1");

      element.style.fontSize = '8px';
      element.style.lineHeight = '12px';
    });

    layoutWelcome.forEach(function (element) {
      element.classList.remove("flex");
      element.classList.add("d-block");

      element.classList.remove("py-4");
      element.classList.add("py-5");
      element.classList.add("pt-4");
    });

    layoutBaganWelcome.forEach(function (element) {

      element.classList.remove("px-9");
      element.classList.add("px-4");

    });

    layoutBtnPengaduan.forEach(function (element) {

      element.classList.add("float-end");

    });
    btnPengaduan.forEach(function (element) {
      element.classList.remove("px-5");
      element.classList.add("px-3");

      element.style.fontSize = '8px';
    });

    textheadDash.forEach(function (element) {
      element.classList.remove("text-lg");
    });

    //Tabel text
    textTabelTop.forEach(function (element) {
      element.style.fontSize = '11px';
    });
    textTabel.forEach(function (element) {
      element.style.fontSize = '10px';
    });

    //Card dalam halaman kependudukan
    layoutInsideCardKependudukan.forEach(function (element) {
      element.classList.remove("py-3");
      element.classList.add("py-1");
    });
    iconCardKependudukan.forEach(function (element) {
      element.classList.add("p-0");
    });

    //Gambar Struktur Organisasi
    cardimgStruktur.forEach(function (element) {
      element.classList.remove("col-8");
      element.classList.add("col-12");
    });

     // perubahan col dalam pembuatan surat online bagian input
     colPembuatanSurat__Online.forEach(function(element){
      element.classList.remove("col-4");
      element.classList.add("col-6");

    });

  }

  // Remove latest news element
  function removeLatestNewsElement() {
    if (latestNewsElements) {
      latestNewsElements.remove();
    }
  }

  function removeElement(element) {
    if (element) {
      element.remove();
    }
  }

  // Adjust column widths for various elements
  function adjustColumnWidths() {
    colDetailBerita.forEach(function (element) {
      element.classList.remove("col-8");
      element.classList.add("col-12");
    });

    LayoutCardKependudukan.forEach(function (element) {
      element.classList.remove("col-4")
      element.classList.add("col-6")
    });
  }

  // Add 'container' class to an element
  function addContainerClassToElement(element) {
    if (element) {
      element.classList.add('container');
    }
  }

  // Remove 'container' class from an element
  function removeContainerClassFromElement(element) {
    if (element) {
      element.classList.remove('container');
    }
  }

  // Event listener for viewport width changes
  window.addEventListener("resize", checkViewportWidth);

  // Initial check on page load
  checkViewportWidth();
});




document.addEventListener("DOMContentLoaded", function () {
  var root1 = am5.Root.new("apbdes");

  // Set themes
  root1.setThemes([
    am5themes_Animated.new(root1)
  ]);

  // Create first chart (Pie Chart)
  var chart1 = root1.container.children.push(
    am5percent.PieChart.new(root1, {
      endAngle: 270
    })
  );

  // Create series for the first chart
  var series1 = chart1.series.push(
    am5percent.PieSeries.new(root1, {
      valueField: "pengeluaran",
      categoryField: "judulPengeluaran",
      endAngle: 270
    })
  );

  series1.states.create("hidden", {
    endAngle: -90
  });
  var subsetData = chartBeranda.slice(1);
  series1.data.setAll(subsetData);
  series1.appear(1000, 100);
});

document.addEventListener("DOMContentLoaded", function () {
  am4core.useTheme(am4themes_animated);

  // Create chart instance
  var chart = am4core.create("apbdesTahunan", am4charts.XYChart);

  // Mengambil data dari server
  chart.data = chartData;

  // Create axes
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "tahun";
  categoryAxis.title.text = "Pemasukan Dan Pengeluaran Desa Palasari";
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.minGridDistance = 20;
  categoryAxis.renderer.cellStartLocation = 0.1;
  categoryAxis.renderer.cellEndLocation = 0.9;

  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.min = 0;
  valueAxis.title.text = "Pengeluaran";

  // Create series
  function createSeries(field, name, stacked) {
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = field;
    series.dataFields.categoryX = "tahun";
    series.name = name;
    series.columns.template.tooltipText = "{name}: [bold]{valueY}[/]";
    series.stacked = stacked;
    series.columns.template.width = am4core.percent(95);
  }
  createSeries("anggaran", "Anggaran");
  createSeries("jumlah", "Pengeluaran");
  // Add legend
  chart.legend = new am4charts.Legend();
});

