

# Spartial Notes - Location-Based Note-Taking Application

## Description

- Leave a note at your favorite location and it will be waiting for you the next time you visit!

**Spartial Notes** is a note-taking application with a unique twist: it integrates geolocation to enhance user experience. Users can create public or private notes, and by leveraging geolocation data, they can find notes created by others based on proximity. The app supports privacy with passkey-protected private notes, ensuring that sensitive content remains secure.

## Features
- **Geolocation-Enabled Notes**: Automatically fetches the user's latitude and longitude to help find notes nearby.
- **Public and Private Notes**: Users can create either public notes visible to everyone or private notes accessible only via a passkey.
- **Simple, Intuitive Interface**: A clean UI built using Tailwind CSS and Alpine.js to ensure a smooth and responsive user experience.
- **Privacy and Security**: Private notes require a passkey for access, adding an extra layer of security.

## Technologies Used
- **Backend**: Laravel (PHP Framework)
- **Frontend**: Blade Templates, Tailwind CSS, Alpine.js
- **Geolocation**: Google Maps JavaScript API
- **Database**: MySQL or any supported database by Laravel
- **Version Control**: Git

## Installation and Setup

### Prerequisites
- PHP 8.x
- Composer
- Node.js and npm
- MySQL or any other database supported by Laravel
- Google Maps API Key (for geolocation services)

### Steps to Install

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/spartial-notes.git
   ```

2. **Navigate to the project directory**:
   ```bash
   cd spartial-notes
   ```

3. **Install dependencies**:
   ```bash
   composer install
   npm install
   ```

4. **Set up the `.env` file**:
   Copy the `.env.example` file and configure your environment:
   ```bash
   cp .env.example .env
   ```
   Set your database configuration and **Google Maps API Key** in the `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password

   GOOGLE_MAPS_API_KEY=your-google-maps-api-key-here
   ```

5. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

6. **Run migrations**:
   ```bash
   php artisan migrate
   ```

7. **Build frontend assets**:
   ```bash
   npm run build
   ```

8. **Serve the application**:
   ```bash
   php artisan serve
   ```

   The app will be accessible at `http://127.0.0.1:8000`.

## Usage

### Create a New Note
1. Navigate to the "Create New Note" button on the homepage.
2. Choose the note visibility (Public or Private).
3. If the note is marked as Private, enter a passkey for security.
4. Save the note.

### Find Nearby Notes
1. The application will automatically fetch your location (latitude and longitude) upon loading.
2. Click the "Find Nearby Notes" button to view notes based on proximity.

### Geolocation Setup
The app uses the **Google Maps API** to fetch user coordinates. Ensure your Google Maps API key is added in the `.env` file to enable this feature.

### Note Privacy
- **Public Notes**: Can be viewed by anyone.
- **Private Notes**: Protected by a passkey. Only those with the correct passkey can view the note.

## Google Maps API Key
To use the location features, you'll need a Google Maps API key:
1. Go to the [Google Cloud Console](https://console.cloud.google.com/).
2. Enable the **Google Maps JavaScript API**.
3. Create an API key and restrict its usage to your domain or IP.
4. Add the API key to your `.env` file under `GOOGLE_MAPS_API_KEY`.

## Security
- **Environment Variables**: Sensitive information such as API keys and database credentials are stored in the `.env` file, which is not included in version control.
- **Passkey for Private Notes**: Users can create private notes that require a passkey to access, enhancing security.

## Known Issues
- If geolocation fails, the app will alert the user that their browser does not support geolocation.
- Currently, there is no support for collaborative note-taking or real-time updates.

## Future Enhancements
- **Enhanced Note Filters**: Allow filtering by proximity distance.
- **Customizable Note Access**: Implement features to allow access to notes by user groups or friends.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

