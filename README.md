# PIR-Surveillance-Station
Use the Pir of your webcam (Like an Axis webcam) to start recording the video on your Synology in Surveillance Station


- Enable Web station in Settings -> Web services
- Place startrecording.php in /web
- Set up a trigger in your webcam to make a HTTP request to http://diskstation/startrecording.php
