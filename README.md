Neptr
=====

Neptr is a simple blog written according to the rules of Object Calisthenics,
or at least a modified PHP version thereof. Here's the list, along with my thoughts and observations:

1. Only One Level Of Indentation Per Method

Pretty straightforward.

    public function followingTheRules() {
        while ($thisLineDoesNotCountAsIndented) {
            print "This is one level of indentation.";
            
            while ($thisIsAlsoOneLevelOfIndentation) {
                // print "Two levels of indentation is not allowed!"
            }
         
            if ($youCheatByPuttingAnEntireControlBlockOnOneLine) { /* print "That isn't allowed either!"; */ }
        }
    }

2. Don’t Use The ELSE Keyword

Also straightforward.

3.  Wrap All Primitives And Strings

In Java, arrays and resources are objects, but not in PHP. So I'm intepreting this to mean
"everything that isn't an object should be wrapped in one." More specifically, I'm interpreting it
as "Non-objects can only be assigned to variables that are the properties of objects." If
you're not assigning, you don't need to wrap it.

Acceptable:

    if ($importantObject->importantMethod() > 0) {
        throw new Exception('The value is too damn high!'); // Using a string as an argument
    }
    
Not acceptable:

    $importantInteger = $importantObject->importantMethod(); // Assigning an integer to a variable
    if ($importantInteger > $expectedInteger) {
        $errorString = "The value is too damn high!" // Assigning a string to a variable
    }

By the way, (https://www.slideshare.net/guilhermeblanco/object-calisthenics-applied-to-php) suggests
that this is a bad rule for PHP, and suggests instead that if the scalar has a behavior, then it
gets wrapped. I'm not entirely sure what that means, given that scalars don't have behaviors.

4. First Class Collections

The previous rule means no arrays outside of member variables (in PHP terms, non-static properties).
This rule means that if a member variable is an array, that object shouldn't have any other
member variables.

So scalars and resources should always be assigned to object properties, and arrays should always
be assigned to the properties of an object that only has one property.

5. No more than one arrow per line, not counting `$this->`

This is originally "one dot per line," but PHP uses arrows, and accessing a property
requires an arrow, so this rule amounts to the same thing. But PHP doesn't do
`$this->country->state->town->address->visit()` unless you really work at it.

6. Don’t Abbreviate

Just to be pedantic, technically "HTML" is an abbreviation for "hypertext markup language,"
but I'm not going to write functions called outputHypertextMarkupLanguage(). In general, I'm
interpreting this rule as "don't use abbreviations that you wouldn't use in spoken conversation"
with another developer." So this is okay (but perhaps not ideal):

    if ($server->isDev()) {
        $html .= $memberId;
    }
    
...because you might say "The HTML on the dev server contains the member ID." But this isn't okay:

    if ($srv->isDev()) {
        $dspTxt .= $mId;
    }
    
...because you'd never says "The dsp txt on the dev srv contains the m ID."

7. Keep All Entities Small

Originally "no class over 50 lines and no package over 10 files." PHP takes up more space
than Java, especially with DocBlocks, and it doesn't have packages in the same sense. So
I'm going with "no class over 100 lines, and no top-level namespace with over 10 classes."
I'm using PSR-4 namespacing, so that also means no more than 10 files per directory.

8. No Classes With More Than Two Instance Variables

In PHP terms, an instance variable is a non-static property of a class. So, two non-static properties at most.
But what can go in those properties? Obviously, a scalar, an object, or a resource. What about arrays?
An example in the original Object Calisthenics article uses the example of a class that contains a List of
given names, so from that we can infer that an indexed array of strings is okay. It stands to reason that
an indexed array of any scalar, object, or resource is okay. What about associative arrays? My
first thought is that associative arrays shouldn't be allowed, because they can easily be used
as if they were properties, just replace `$this->first_name` with `$this->p['first_name']`. More characters,
same effect. 

At the same time, though, if the author wanted to ban HashMaps and similar Java collections, you'd think
he'd say so. And, while we're at it, consider that an indexed array of strings could be used as properties
as well, just hard-code '0' as first_name, '1' as middle_name, and so forth.

So here's my take on arrays as properties: They're allowed, as long as they're arbitrary. A class
can't demand to get an array with 'first_name' as one of the keys, nor an array of exactly three members in
the order of the first, middle and last names. It can, however, take a list of given names of abritrary
length (as in the example), or say an associative array of English first names and their Spanish equivalents if
you needed to map one to the other for some reason. And, by extension, you can have arrays of arrays of
arrays as long as it's arbitrary turtles all the way down.

9. No Getters or Setters

The exact definition of "getters and setters" is a bit fuzzy here. I could always rename getName()
and setName() to retrieveName() and assignName(), but that's clearly cheating. If instead of
`print $object->getName();` you have `$object->printName()`, is that okay? What
about `print $country->format(COUNTRY::ISO_ALPHA3);`? The latter isn't a getter as such, but it does
return a scalar value that may or may not be one of its properties. (One could imagine a Country
class that stores the canonical country value as ISO ALPHA-2, ISO ALPHA-3, or UN M.49, only in the
second of those cases would format() act as a getter.)

The most lax rule would be "The class cannot contain a method that does nothing more than return
a designated property verbatim." In that case, $emailAddress->getAsJson() would technically be
allowed, because it at least transforms the property.

A more strict rule would be "The class cannot contain a method that returns a representation of
a property." In that case, $emailAddress->getAsJson() would not be acceptable, but $emailAddress->getLength()
would be, because you can't reverse engineer the email address from its length.

At that point, though, we run into the awkward "Wrap your scalars" rule, which if taken very strictly
would mean that nothing can return a scalar. Which would mean, in essence, that data must be passed
directly from object to object. So we can't do this:

$printer->printBlanks($emailAddress->getLength());

But we could do this?

    $obscurer = new Printer(Printer::REPLACE_WITH_BLANKS);
    $emailAddress->usePrinter($obscurer);
    
    public function usePrinter (Printer $printer) {
        $printer->print($this->emailAddress);
    }
    
    public function print($text) {
        $this->printBlanks($text);
    }

So text is being passed around (because at some point you're going to need to do something with
the actual string, not just the object that contains the string), but scalars are never returned by
functions, properties are only passed from inside the class, and passed scalars are never assigned
to properties (because that would be a setter).

Which raises the question, how do we get information inside objects if we don't use setters? Let's go back
to the Country class. How do we tell it we want it to represent Norway?

To begin with, it only makes sense to identify Norway as "Norway." Even if we wanted to feed it the
ALPHA-3 or M.49 code, at some point we'd likely have to ask "What's Norway's code", which amounts to the
same thing only more awkward.

So we need to be able to tell $country "Be Norway";

If $country stores the country as an M.49 code, then technically `$country->assignByName('Norway')`
isn't a setter. But `$country->assignByM49Code(578)` would be. And `$country->assign(578, Country::M49_CODE)`
would sometimes be. But by the lax rule, `$country->assign()` is acceptable.

The strict-rule equivalent would be "An object cannot contain a method that sets a property based
on a representation of that property." Which is kind of unworkable. Honestly, I can't think of a way
to do it. 

William Durand says "It is okay to use accessors to get the state of an object, as long as you don’t
use the result to make decisions outside the object. Any decisions based entirely upon the state of
one object should be made inside the object itself." Which raises the question, what are you going
to do with that state other than make decisions based on it? Also, this is even more strict than
my strict rule, in a way: You can't even use accessors that aren't technically getters.

Durand also indicates that it's okay to use a getter to display the score, presumably because printing
isn't a decision.

Durand is also a proponent of "you only have to wrap primitives if they have behaviors," which is
begging for some explanation.

"The first and foremost alternative to a state-altering operation are immutable objects."

Okay, after some more reading, here is what we have:

A setter is a method that simply writes to a property (in PHP terms). A getter is a method that simply
returns a property. 
___

There are a few provisos, a couple of quid-pro-quos.... Obviously, the rules don't apply to imported libraries;
I'm not writing a MySQL driver myself, much less one that follows Object Calisthenics. Also, I'm not applying
the rules to the semi-demi-code in Twig templates, or anything other than code written in PHP or Javascript/jQuery.
