#!/usr/bin/perl
open (FILE_HANDLE, ">/var/www/hello.txt");
#print "content-type: text/html\n\n";
print FILE_HANDLE "hello, world!";
close (FILE_HANDLE);


print "Content-Type: text/html\n\n";
print "Report generated.\n";

exit(0);

