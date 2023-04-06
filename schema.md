# Database Migration

## Workshop

- Plan the tables for the following

User stories:

- [x] As a user, I can view a list of movies
- [x] As a user, I can search movies by actor
- [x] As a user, I can search movies by genre
- [x] As a user, I can select a specific movie and see details for that movie
- [x] As a user, I can rate a movie (like / dislike) (1:like, -1:dislike)
- [x] As a user, I can view the ratings for a movie
- [x] As a user, I can view the list of 'trending' movies
  - Trending = lots of ratings, in the last 2 weeks
- [x] As a user, I can create / update / delete movies collections
  - Update:
    - rename
    - add movie / remove to / from a collection

**user**

| id  | name |
| --- | ---- |
| 1   | John |
| 2   | Jane |

**ratings**

| id  | user_id (FK:user,id) | movie_id (FK:movies,id) | like | date       |
| --- | -------------------- | ----------------------- | ---- | ---------- |
| 1   | 1                    | 1                       | 1    | 2023-04-05 |
| 2   | 1                    | 2                       | -1   | 2023-04-05 |

**collection**

| id  | user_id (FK:user, id) | collection_name |
| --- | --------------------- | --------------- |
| 1   | 1                     | fav_action      |
| 2   | 1                     | kids            |
| 3   | 1                     | romcoms         |
| 4   | 2                     | favourites      |

**collection_movie**

| id  | collection_id (FK:colleciton,id) | movie_id (FK:movies,id) |
| --- | -------------------------------- | ----------------------- |
| 1   | 1                                | 1                       |
| 2   | 1                                | 2                       |
| 3   | 3                                | 2                       |

**actors**

| id  | name       |
| --- | ---------- |
| 1   | Tom Cruise |

**directors**

| id  | name       |
| --- | ---------- |
| 1   | Tom Cruise |

**movies**

| id  | name               | year |
| --- | ------------------ | ---- |
| 1   | Mission Impossible | 2004 |
| 2   | Top Gun            | 1986 |

**genre**

| id  | name   |
| --- | ------ |
| 1   | Action |

**genre_movie**

| id  | movie_id (FK:movie,id) | genre_id (FK:genre,id) |
| --- | ---------------------- | ---------------------- |
| 1   | 1                      | 1                      |
| 2   | 2                      | 1                      |
| 3   | 3                      | 1                      |

**castings**

| id  | actor_id (FK:actors,id) | movie_id (FK:movies,id) | role      |
| --- | ----------------------- | ----------------------- | --------- |
| 1   | 1                       | 1                       | Mr Klump  |
| 2   | 1                       | 2                       |           |
| 3   | 1                       | 1                       | Mrs Klump |

## Seeders

- [x] Movie
- [x] Rating
- [x] Director
- [x] User
- [x] Collection
- [x] Genre *Karl*
- [ ] casting 
