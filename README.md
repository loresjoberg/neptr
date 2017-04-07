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

Also straightforward. Easier than you might think. Guard clauses help here.

3.  Wrap All Primitives And Strings

In PHP terms, a "primitive" is anything that isn't an object: scalars, arrays, and
resources. I'm interpreting this to mean that a primitive value can't be assigned to a
variable unless that variable is the property of an object. However, they can be
used as arguments and comparators. I'm also excluding closures, although I'm not sure
how I feel about that.

Acceptable:

    if ($importantObject->importantMethod() > 0) {
        throw new Exception('The value is too damn high!'); // Using a string as an argument
    }
    
Not acceptable:

    $importantInteger = $importantObject->importantMethod(); // Assigning an integer to a variable
    if ($importantInteger > $expectedInteger) {
        $errorString = "The value is too damn high!" // Assigning a string to a variable
    }

4. First Class Collections

In the original: "Any class that contains a collection should contain no other member variables." 
I'm not familiar enough with Java to know *precisely* what that means, but in PHP terms
I'm taking it to mean that an object that has an array (of any sort) as one of its 
properties can't have any other properties.

5. No more than one arrow per line, not counting `$this->`

This is originally "one dot per line," but PHP uses arrows, and accessing a property
requires an arrow, so this rule amounts to the same thing. I don't think this was
intended to refer to multiple dots/arrows across different statements, e.g.
`$this->translator->translate($this->talker->talk())`.

6. Don’t Abbreviate

Just to be pedantic, technically "HTML" is an abbreviation for "hypertext markup language,"
but I'm not going to write functions called outputHypertextMarkupLanguage(). In general, I'm
interpreting this rule as "don't use abbreviations that you wouldn't use in spoken conversation"
with another developer." So this is okay abbreviation (although it breaks the other rules)...

    if ($server->isDev()) {
        $html .= $memberId;
    }
    
...because you might say "The HTML on the dev server contains the member ID."

But this isn't okay...

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

In PHP terms, an "instance variable" is a non-static propery. So, two non-static properties at most.
And only one property of any sort if that property is an array (Rule 4). This leads to an
interesting potential cheat: You could easily create a single property called $var that contains
any number of variables, which means that instead of saying `$this->property` you could say
`$this->var['property']` and have any number of virtual properties. This is obviously against
the spirit of the exercise, like doing "pull-ups" while standing on a chair.

At the same time, the original Object Calisthenics exercise has an example that uses a list of
string, in essence an indexed array, so the intent clearly isn't to ban arrays entirely or to
make them always contain objects. So here's my interpretation: An object can contain a single
array of any sort, including multidimensional arrays. However, the arrays have to be arbitrary,
in the sense that the object can't expect specific keys. So this is against the rules...

    private $name = [
        'first' => 'John',
        'middle' => 'Jingleheimer',
        'last' => "Schmidt'
    ];

    private function spyIntroduction() {
        return "The name's {$this->name['last']}. {$this->name['first']} {$this->name['last'}.";
    }

...because it assumes that there will be fields called 'first' and 'last'. This is also cheating...

    private $name [
        'John',
        'Jingleheimer',
        'Schmidt
    ];
    
    private function spyIntroduction() {
        return "The name's {$this->name[2]}. {$this->name[0]} {$this->name[2}.";
    }
    
...because it's just using numbers as aliases for key names.

This, however, is okay...

    private $mapEnglishToSpanish = [
        'John' => 'Juan',
        'William' => 'Guillermo',
        'Jesus' => 'Jesus'
    ];
    
    private function spanishEquivalent($englishName) {
        return $mapEnglishToSpanish[$englishName];
    }
    
...because it doesn't assume that there will be a key called 'John'.

This is also okay...

    private $daysOfTheWeek = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday'
    ];
    
    private goodMorning(int $lastNight) {
        return "Welcome to $daysOfTheWeek[$lastNight + 1]!";
    }

...because `$daysOfTheWeek[0]` isn't an alias of anything other than the value.

9. No Getters or Setters

The secret for "no setters" is this: A constructor doesn't count as a setter. So
`$password = new Password('badpassword')` or a named constructor like 
`$password = Password::fromPlainText('badpassword')` are just fine.

There are other options for affecting the properties of the object, like `$hitPoints->takeDamage(5)`
but one of the implications of small objects is that you
might just swap them out, as in...

    $employee->newSalary('100000');
    
    public function newSalary($value) {
        $this->salary = new Salary::inDollars($value)
    }

This isn't a setter, because it doesn't mindlessly assign the given value to a property,
instead it creates a new object (which may do some validation or manipulation) by passing
the property to the constructor. This isn't merely a loophole, it's the difference between
using objects as objects and just using them as wrappers around procedural code.

Getters are trickier, more on those once I get more practice in.

___

There are a few provisos, a couple of quid-pro-quos.... Obviously, the rules don't apply to imported libraries;
I'm not writing a MySQL driver myself, much less one that follows Object Calisthenics. Also, I'm not applying
the rules to the semi-demi-code in Twig templates, or anything other than code written in PHP or Javascript/jQuery.
