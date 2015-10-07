echo "Removing old content dirs/links just to make sure..."
rm -Rf content

echo "Creating a new link to content dir..."
ln -s ../../../../repos/slowcarber-content content
