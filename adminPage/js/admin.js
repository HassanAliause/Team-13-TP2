window.addEventListener("scroll", () =>{
  if(window.pageYOffset > 100){
    bckToTop.classList.add("active");
  }else{
    bckToTop.classList.remove("active");
  }
  })

function openSidebar() {
    if(!sidebarOpen) {
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen = true;
    }
}

function closeSidebar() {
    if(sidebarOpen) {
        sidebar.classList.remove("sidebar-responsive")
        sidebarOpen = false;
    }
}



// Charts //
// Bar Chart //
      
var barChartOptions = {
    series: [{
      data: [10, 15, 6, 8, 2],
      name: "Products",
    }],
    chart: {
      type: "bar",
      background: "transparent",
      height: 350,
      toolbar: {
        show: false,
      },
    },
    colors: [
      "#2962ff",
      "#d50000",
      "#2e7d32",
      "#FFFF00",
      "#583cb3",
    ],
    plotOptions: {
      bar: {
        distributed: true,
        borderRadius: 4,
        horizontal: false,
        columnWidth: "40%",
      }
    },
    dataLabels: {
      enabled: false,
    },
    fill: {
      opacity: 1,
    },
    grid: {
      borderColor: "#000000",
      yaxis: {
        lines: {
          show: true,
        },
      },
      xaxis: {
        lines: {
          show: true,
        },
      },
    },
    legend: {
      labels: {
        colors: "#FFFFFF",
      },
      show: true,
      position: "top",
    },
    stroke: {
      colors: ["transparent"],
      show: true,
      width: 2
    },
    tooltip: {
      shared: true,
      intersect: false,
      theme: "dark",
    },
    xaxis: {
      categories: ["PCs", "Phones", "Monitors", "Headphones", "Webcams"],
      title: {
        style: {
          color: "#FFFFFF",
        },
      },
      axisBorder: {
        show: true,
        color: "#000000",
      },
      axisTicks: {
        show: true,
        color: "#000000",
      },
      labels: {
        style: {
          colors: "#FFFFFF",
        },
      },
    },
    yaxis: {
      title: {
        text: "Frequency",
        style: {
          color:  "#FFFFFF",
        },
      },
      axisBorder: {
        color: "#55596e",
        show: true,
      },
      axisTicks: {
        color: "#000000",
        show: true,
      },
      labels: {
        style: {
          colors: "#000000",
        },
      },
    }
  };
  
  var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
  barChart.render();
  

