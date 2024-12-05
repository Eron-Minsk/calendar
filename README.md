# Holocene Calendar Viewer

A simple PHP-based web application that displays the current month of the Holocene Calendar (HE) with an interactive calendar interface. The calendar allows users to navigate between months and view the days of the Holocene Calendar in a visually appealing format.

## Features

- **Holocene Calendar Display**: The calendar shows the current month of the Holocene Era, with year adjustments based on the Gregorian calendar.
- **Navigation**: Buttons to navigate to the previous and next months.
- **Responsive Design**: The layout adjusts to different screen sizes, providing an optimal viewing experience on mobile and desktop.
- **Interactive Days**: Hovering over the days will change their background color for a dynamic effect.

## Installation

1. Download the repository or clone it using Git:
   ```bash
   git clone (https://github.com/Eron-Minsk/calendar.git)
   ```

2. Upload the files to your web server, ensuring PHP is enabled.

3. Place an image (e.g., `starfield.jpg`) in the same directory as the PHP files for the background to work correctly.

4. Open the `calendar.php` file in a browser to view the Holocene calendar. You can navigate through months by clicking the "Previous Month" and "Next Month" buttons.

## Code Explanation

### HTML Structure
- The `<h1>` element displays the current month and year in the Holocene Era.
- The calendar is built dynamically using PHP to calculate the days of the current month and its starting day of the week.
- Day names (Sun, Mon, Tue, etc.) are displayed in a grid layout.

### PHP Logic
- The `getCalendarDetails` function calculates the first day of the month and the number of days in the month based on the provided month and year.
- Navigation buttons update the URL parameters (`month` and `year`) to switch between months.

### CSS Styles
- The calendar uses a starry background image (`starfield.jpg`) and highlights each day with a hover effect.
- The layout is built with CSS grid for the calendar, and navigation buttons have smooth hover transitions for a more interactive feel.

## Image Attribution
The background image is from [wallpapers.com](https://wallpapers.com/wallpapers/kurzgesagt-v21ypm6kko2yuoic/download).

## License

See LICENSE.md in this repo

## Contributions

Feel free to fork the repository and create a pull request if you have improvements or suggestions!

