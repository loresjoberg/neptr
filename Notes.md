Development Notes
=================

2017-04-09
----------

Okay, so for a while I was making Artisans pass arrays directly to each other, which played
by the rules but felt awkward. Once I realized that I could expose ArrayObjects without
having to wrap them, I went back to using Receptacles, which at this point are just ArrayObjects
with individual class names. 

Right now they're very bare, but I'm seeing the logic; it's basically the same logic behind wrapping
scalars. Point One: You can add validation code. I can make sure that all the keys of my Coffers
are lexically valid class names, for instance. Point Two: You can prevent the wrong thing going in
the wrong place. If an Apothecary receives a Coffer in its constructor, you know something has 
gone wrong.

I do want to keep Receptacles generic by entity, having to create three Artisans is enough.

I'm tempted by the Tome idea again, just because there's a certain appeal in being able to
just fill out a data structure to create a new class. But by definition, that data structure would
be a pidgin, and the whole point of creating this rather than using some sort of Active Record
deal is to make something that can work with an installed database, even if you can't control
the structure, and even if it's a really poorly designed database. For instance, I'm not going to
be able to write a pidgin that takes something like Cartthrob's 'extras' field into account.

I suppose for the Apothecary I could go back to the idea of having a given field key map to
itself, another field name, or a function. But separating that from the actual class just
makes it more difficult on the IDE. 

---

Once again, I'm confused by the rules about Collections. I think it comes down to not being clear
on whether something like `$value = $collectionObject[$key]` is a getter or not. In Java, collections
are premade objects, so using their "getter" isn't a design choice. Or is it? Let's look at some
sample code from the essay (comments are mine):