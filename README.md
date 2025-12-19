# Prescription-Generator

**Prescription-Generator** is a web-based application designed to simplify medical prescription management. It allows doctors to generate prescriptions, manage appointments, keep patient records, and send real-time notifications.

## Demo
**Live Link:**
[https://pws.free.nf](https://pws.free.nf)



## Features

* **Prescription Generation**: Quickly create prescriptions by entering patient details and selecting medicines.
* **Record Keeping**: Automatically saves each prescription for future reference.
* **Real-Time Drug Search**: Search medicines from the database as you type to ensure accuracy.
* **Appointment Management**: Patients can book appointments, and they receive SMS notifications upon booking.

## Technology Stack

* **Frontend**: HTML, CSS, JavaScript, Bootstrap, jQuery
* **Backend**: PHP
* **Database**: MySQL
* **SMS Notifications**: Integrated with SMS API for appointment alerts

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/sarwar76200/PWS.git
   ```
2. Move the `pws` folder to `xampp/htdocs`
3. Import the database:

   * Open `phpMyAdmin`.
   * Create a new database named `pws` and import `drugs.sql`.
4. Configure the SMS API settings in `sms.php` (If Needed).
5. Run the project by accessing `http://localhost/pws` in your browser.

## Usage

1. Open the application in your browser.
2. Enter patient details and select medicines to generate a prescription.
3. Save the prescription for record keeping.
4. Patients can book appointments using the appointment form.
5. SMS notifications are sent automatically to patients upon successful booking.

## Contributing

Contributions are welcome! Steps:

1. Fork the repository.
2. Create a new branch:

   ```bash
   git checkout -b feature/YourFeature
   ```
3. Commit your changes:

   ```bash
   git commit -m "Add some feature"
   ```
4. Push to the branch:

   ```bash
   git push origin feature/YourFeature
   ```
5. Open a Pull Request.

## License

This project is licensed under the MIT License.
