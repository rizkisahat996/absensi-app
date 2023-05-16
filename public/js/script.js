 //Function Signature
let sig = $('#sig').signature({
          syncField: '#signature64',
          syncFormat: 'PNG',
          guideline: true,
          scale: 1,
          distance: 0
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
//     //Function Prev & Next Button
//     let currentField = 1;
//     const fieldCount = 5;
//     const prevBtn = document.getElementById('prev-btn');
//     const nextBtn = document.getElementById('next-btn');

//     function showField(fieldNum) {
//       const prevField = document.getElementById('field-' + currentField);
//       const nextField = document.getElementById('field-' + fieldNum);

//         prevField.classList.add('hidden');
//         nextField.classList.remove('hidden');
//         currentField = fieldNum;

//         if (currentField === 1) {
//             prevBtn.classList.add('hidden');
//         } else {
//             prevBtn.classList.remove('hidden');
//         }

//         if (currentField === fieldCount) {
//             nextBtn.classList.add('hidden');
//             document.getElementById('submit-btn').classList.remove('hidden');
//         } else {
//             nextBtn.classList.remove('hidden');
//             document.getElementById('submit-btn').classList.add('hidden');
//         }
//     }

//     prevBtn.addEventListener('click', function() {
//         showField(currentField - 1);
//     });

//     nextBtn.addEventListener('click', function() {
//         showField(currentField + 1);
//     });

      //Function Time
      function displayTime() {
      var date = new Date();
      var hours = date.getHours();
      var minutes = date.getMinutes();
      var seconds = date.getSeconds();

      hours = (hours < 10 ? "0" : "") + hours;
      minutes = (minutes < 10 ? "0" : "") + minutes;
      seconds = (seconds < 10 ? "0" : "") + seconds;

      var time = hours + ":" + minutes + ":" + seconds;

      document.getElementById("time-1").innerHTML = time;
      document.getElementById("time-2").innerHTML = time;
    }

    setInterval(displayTime, 1000);

    //Function Date
    function getCurrentDateTime() {
      const months = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"];
      const currentdate = new Date();
      const datetime = currentdate.getDate() + " "
                    + months[currentdate.getMonth()] + " "
                    + currentdate.getFullYear()
      return datetime;
    }

    setInterval(function() {
      var currentTime = getCurrentDateTime();
      document.getElementById("date-1").innerHTML = currentTime;
      document.getElementById("date-2").innerHTML = currentTime;
    }, 1000);
