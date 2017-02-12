[BusyMail][BusyMail] is a Python program that provides statistics about
the user's email usage. It reads a given folder on an IMAP server (for me, the
"starred" messages in GMail) and records which messages are present.
See the [GitHub page][BusyMail] for more information.

### Andrea's vital statistics

For me, the messages that are "starred" are a measure of how busy I am:
when I have to do something connected to the message, I star it.
(After all, "email is a to-do list written by others".)

More in detail, the *number* of messages is proportional to the current "stress",
while the *age* of the messages is propertional to the current "procrastination".

The following are the complete historical plots.


[BusyMail]: https://github.com/AndreaCensi/busymail


<style type='text/css'>
img.plot { width: 100% !important;}
</style>

Complete stress plot (number of starred messages):

<a href="https://censi.science/~andrea/busyplot/stress_complete.png">
  <img class='plot imageZoom' src='https://censi.science/~andrea/busyplot/stress_complete.png'>
</a>

Complete procrastination plot (<strong>mean</strong> message age):

<a href="https://censi.science/~andrea/busyplot/meanage_complete.png">
    <img  class='plot imageZoom'  src='https://censi.science/~andrea/busyplot/meanage_complete.png'>
</a>

Complete procrastination plot (<strong>median</strong>  message age):

<a href="https://censi.science/~andrea/busyplot/procrastination_complete.png">
    <img class='plot imageZoom' src='https://censi.science/~andrea/busyplot/procrastination_complete.png'>
</a>
