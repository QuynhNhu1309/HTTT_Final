

Chart.defaults.global.legend = {
        enabled: false
      };
            // Bar chart

      obj = getArray();
      if(obj.length > 10)
      {
      var ctx = document.getElementById("mybarChart");
      var mybarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
          datasets: [{
            label: '# of Votes',
            backgroundColor: "#26B99A",
            data: obj
          }, {
            label: '# of Votes',
            backgroundColor: "#03586A",
            data: obj
          }]
        },

        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
      }
      else
      {


        var ctx = document.getElementById("Chart_doanhthu_tuan");
        if(obj.length == 5)
        {
          label = ["Tuần 1", "Tuần 2", "Tuần 3", "Tuần 4", "Tuần 5"];
        }

        if(obj.length == 4)
        {
          label = ["Tuần 1", "Tuần 2", "Tuần 3", "Tuần 4"];
        }

         if(obj.length == 6)
        {
          label = ["Tuần 1", "Tuần 2", "Tuần 3", "Tuần 4", "Tuần 5", "Tuần 6"];
        }
      var mybarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: label,
          datasets: [{
            label: '# of Votes',
            backgroundColor: "#26B99A",
            data: obj
          }]
        },

        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
      
      }

