# Digital videogame museum

The idea behind this software is to conserve the history of videogames. There are two objectives.

- Making a database of videogames, platforms and developers. This is not the main
objective, as this info is already stored in the internet in a lot of sites. However
is it required for the next objective.
- Present the info in an amusing and exhaustive way. The info can be in different
formats and always linked to the elements they talk about.

The user will have the possibility of browsing the expositions and the database itself,
and the idea is to support the info in different languages.

The first milestone will be a simple database where to store videogames platforms and companies,
with scores and lists. And articles. The curator will be able to mantain this database
with an admin dashboard and the visitors will be able to mark platforms and videogames as favorites.

## Expositions

This is the key difference between a museum and a simple database.

In this first version the expositions will just be game lists and the database itself.
This will be improved in future versions and the architecture will be extendable.

An 'exposition' is an ordered list of elements and info. The elements can from the most
atomic games, companies and platforms, to the complex events, movements and timelines.
The info is just some side text to give more details about the elements.

For this first version, we will go for the simplest exposition implementation, that's the
article with related elements. The article will be formed by paragraphs (info) and embeds.
Those will show a summary of the element and will link to it.

## User interaction

The main advantage of a website is that the users can interact and share.
For this first version the users will just be able to mark the games as played or not played.

Further functionalities will be implemented in the future.
