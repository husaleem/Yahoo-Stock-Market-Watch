Stock Market Overview Platform
A web-based application that scrapes Yahoo Finance to display the most active stocks in real-time. This platform collects, stores, and updates stock information every 3 minutes, allowing users to view and interact with the latest market data.

Table of Contents
Features
Technologies Used
Installation
Usage
License
Features
Real-Time Stock Data: Scrapes Yahoo Finance’s "Most Active" stocks and updates every 3 minutes to provide current market insights.
Interactive Display: Presents stock symbols, names, prices, daily changes, and volumes in a sortable table format.
Persistent Data Storage: Uses MongoDB to store stock information, ensuring data continuity and fast retrieval.
Sorting Functionality: Enables users to sort data by symbol, name, price, change, or volume for customized viewing.
Technologies Used
Backend: Python, BeautifulSoup, Requests
Database: MongoDB
Frontend: HTML, CSS, PHP, JavaScript
Installation
Clone the repository:

bash
Copy code
git clone https://github.com/husaleem/Yahoo-Stock-Market-Watch.git
cd stock-market-overview
Install Python dependencies:

bash
Copy code
pip install requests beautifulsoup4 pymongo
Set up MongoDB:

Ensure MongoDB is installed and running on your system.
Create a database named finData and a collection named actData.
Run the Python script:

bash
Copy code
python main.py
Access the Frontend:

Place the HTML and PHP files on a server that supports PHP.
Open the index.php file in your browser to view the stock data.
Usage
Automated Data Scraping:

The main.py script runs continuously, scraping Yahoo Finance’s "Most Active" stocks and updating the MongoDB database every 3 minutes.
Viewing the Data:

Open index.php to view a table of the most active stocks.
Click on table headers (Symbol, Name, Price, Change, Volume) to sort data by that column.
