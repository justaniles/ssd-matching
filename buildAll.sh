echo "About to install npm and bower dependencies. This could take a while, please be patient!"
sleep 3
cd results-page
echo "Running npm install..."
npm install
echo "Running bower install..."
bower install
echo "Running grunt build..."
grunt build
echo "All done! The built results-page can be found in results-page/dist"
cd ..
