#!/usr/bin/perl


# The following code deals with the form data
if ($ENV{'REQUEST_METHOD'} eq 'POST') {

# Get the input

    read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});

    # Split the name-value pairs

@pairs = split(/&/, $buffer);

    # Load the FORM variables

    foreach $pair (@pairs) {
       ($name, $value) = split(/=/, $pair);
       $value =~ tr/+/ /;
       $value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;

    $FORM{$name} = $value;
}
}



#Set the form input to a variable
$keyword=$FORM{keyword};

#Start the HTML with some search engine type words
print "Content-type: text/html\n\n";
print "<h2>Here are the logs we found</h2>\n\n";


#Change the directory to the one you want to search - use absolute path
chdir("/usr/lib/cgi-bin");

#Open it
opendir(DIR, ".");

#Start some loops that look for files with .html
while($file = readdir(DIR))
{
    next if ($file !~ /.xml/);
    open(FILE, $file);
    $foundone = 0;
    $title = "";
    while (<FILE>)
    {


#If the keyword is found, set $foundone to one
       if (/$keyword/i)
       {
       $foundone = 1;
       }


#If there is a title, chop it and take the text between the two flags
       if(/<TITLE>/)
       {
       chop;
       $title = $_;
       $title =~ s/<TITLE>//g;
       $title =~ s/<\/TITLE>//g;
       }


#No title? Fine. Use the file name
    }
    if($title eq "")
    {
    $title = $file;
    }


#Print the title and file name so it is a link back to the file, set $listed to 1
    if($foundone)
       {
       print "<A HREF=/$file>$title</A><BR>";
       $listed=1;
       }

close(FILE);

    }


#Close the directory after looping through all the files
closedir(DIR);


# Print one line if no results, another if results were found
    if($listed ne 1)
       {print "Sorry, nothing this time. <A HREF=/search.html>Try again</A>";}
    else
       {print "<P>That's all. Do you want a <A HREF=/search.html>new search?</A>";}


exit;
