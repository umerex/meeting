document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById("meetingModal");
    var closeModal = document.getElementById("closeModal");
    var span = document.getElementsByClassName("close")[0];
    var successMessage = document.getElementById("successMessage");
    
    // Open modal on table cell click
    // document.querySelectorAll("table tbody td").forEach(function (cell) {
    //     cell.addEventListener('click', function () {
    //         console.log('Cell clicked!');

    //         // Clear previous input values (if any)
    //         document.getElementById("start").value = '';
    //         document.getElementById("end").value = '';
    //         document.getElementById("title").value = '';
    //         successMessage.style.display = 'none'; // Hide success message if visible
            
    //         // Show the modal
    //         modal.style.display = "block";
    //     });
    // });


    let selectedCell = null; // Variable to keep track of the selected cell

    document.querySelectorAll("table tbody td").forEach(function (cell) {
        cell.addEventListener('click', function () {
            if (this.classList.contains("booked")) return; // Prevent clicking on already booked cells

            console.log('Cell clicked!');
            selectedCell = this; // Store the reference to the clicked cell

            // Clear previous input values (if any)
            document.getElementById("start").value = '';
            document.getElementById("end").value = '';
            document.getElementById("title").value = '';
            successMessage.style.display = 'none'; // Hide success message if visible
            
            // Show the modal
            modal.style.display = "block";
        });
    });



    // Close modal on "Close" button click
    // closeModal.onclick = function () {
    //     modal.style.display = "none";
    // };

    // Close modal on "X" span click
    span.onclick = function () {
        modal.style.display = "none";
    };

    // Close modal if clicking outside the modal content
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

    // Handle form submission
    // document.getElementById("meetingForm").addEventListener('submit', function (e) {
    //     e.preventDefault(); // Prevent form from submitting the traditional way

    //     var formData = new FormData(this); // Collect form data

    //     // Send data to the Symfony backend
    //     fetch('/save-meeting', {
    //         method: 'POST',
    //         body: formData
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.success) {
    //             // Show success message
    //             successMessage.style.display = 'block';
    //             modal.style.display = 'none'; // Hide the modal after submission
    //         } else {
    //             alert("Error saving meeting: " + data.error);
    //         }
    //     })
    //     .catch((error) => {
    //         console.error('Error:', error);
    //     });
    // });
    
    // Handle form submission

    document.getElementById("meetingForm").addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent form from submitting the traditional way

        var formData = new FormData(this); // Collect form data

        // Send data to the Symfony backend
        fetch('/save-meeting', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Highlight the selected cell
                if (selectedCell) {
                    selectedCell.style.backgroundColor = '#D2E0FB'; // Change to light green or any color you prefer
                    selectedCell.innerText = document.getElementById("title").value; // Set the title of the meeting
                    selectedCell.classList.add("booked"); // Add a class to mark it as booked
                }

                // Show success message
                successMessage.style.display = 'block';
                modal.style.display = 'none'; // Hide the modal after submission
            } else {
                alert("Error saving meeting: " + data.error);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    });

        

});
