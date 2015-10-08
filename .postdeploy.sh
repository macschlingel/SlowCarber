source ../../data/postdeploy.vars.sh

echo "Removing old content dirs/links just to make sure..."
rm -Rf content

echo "Creating a new link to content dir..."
ln -s ../../../../repos/slowcarber-content content

echo "Notifying Slack"
curl -X POST --data-urlencode 'payload={"channel": "#slowcarber", "username": "webserver", "text": "Changes receid. Now live."}' $slackURL