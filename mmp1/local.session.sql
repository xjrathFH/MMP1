CREATE TABLE songs (
    song_id SERIAL PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    artist VARCHAR(100) NOT NULL,
    album VARCHAR(100) NOT NULL,
    release_date DATE NOT NULL,
    genre VARCHAR(50) NOT NULL,
    lyrics TEXT NOT NULL
);
INSERT INTO songs (
        title,
        artist,
        album,
        release_date,
        genre,
        lyrics
    )
VALUES (
        ' Chicago ',
        ' Sufjan Stevens ',
        ' Illinois ',
        ' 2005 07 05 ',
        ' Indie Folk ',
        ' I fell in love again All things
go,
    all things
go Drove to Chicago All things know,
    all things know We sold our clothes to the state I dont mind,
    I dont mind I made a lot of mistakes In my mind,
    in my mind You came to take us All things
go,
    all things
go To recreate us All things grow,
    all things grow We had our mindset All things know,
    all things know You had to find it All things
go,
    all things
go I drove to New York In a van,
    with my friend We slept in parking lots I dont mind,
    I dont mind I was in love with the place In my mind,
    in my mind I made a lot of mistakes In my mind,
    in my mind You came to take us All things
go,
    all things
go To recreate us All things grow,
    all things grow We had our mindset All things know,
    all things know You had to find it All things
go,
    all things
go If I was crying In the van,
    with my friend It was for freedom
From myself
    and
from the land I made a lot of mistakes I made a lot of mistakes I made a lot of mistakes I made a lot of mistakes You came to take us All things
go,
    all things
go To recreate us All things grow,
    all things grow We had our mindset All things know,
    all things know You had to find it All things
go,
    all things
go You came to take us All things
go,
    all things
go To recreate us All things grow,
    all things grow We had our mindset (I made a lot of mistakes) All things know,
    all things know (I made a lot of mistakes) You had to find it (I made a lot of mistakes) All things
go,
    all things
go (I made a lot of mistakes) '
    ),
    (
        ' Fourth of July ',
        ' Sufjan Stevens ',
        ' Carrie & Lowell ',
        ' 2015 03 31 ',
        ' Indie Folk ',
        ' The evil it spread like a fever ahead It was night
    when you died,
    my firefly What could I have said to raise you
from the dead ? Oh could I be the sky on the Fourth of July ? Well you do enough talk My little hawk,
    why do you cry ? Tell me what did you learn
from the Tillamook burn ?
    Or the Fourth of July ? Were all gonna die Sitting at the bed with the halo at your head Was it all a disguise,
    like Junior High
Where everything was fiction,
    future,
    and prediction Now,
    where am I ? My fading supply Did you get enough love,
    my little dove Why do you cry ?
    And Im sorry I left,
    but it was for the best Though it never felt right My little Versailles The hospital asked should the body be cast Before I say goodbye,
    my star in the sky Such a funny thought to wrap you up in cloth Do you find it all right,
    my dragonfly ? Shall we look at the moon,
    my little loon Why do you cry ? Make the most of your life,
    while it is rife While it is light Well you do enough talk My little hawk,
    why do you cry ? Tell me what did you learn
from the Tillamook burn ?
    Or the Fourth of July ? Were all gonna die Were all gonna die Were all gonna die Were all gonna die Were all gonna die Were all gonna die Were all gonna die Were all gonna die '
    ),
    (
        ' Sugar ',
        ' Sufjan Stevens ',
        ' The Ascension ',
        ' 2020 09 25 ',
        ' Indie Pop ',
        ' Is someone gonna cut me some slack ? Now that its a quarter to ten Come on,
    baby,
    gimme some sugar You tell me that you wanna fall back But I dont wanna do this again Come on,
    baby,
    gimme some sugar Stand up straight,
    now,
    stand real tall
    And wipe that writing off the wall This is the right time Come on,
    baby,
    gimme some sugar Now put one foot in front of the other Take a breath now,
    breathe,
    my lover Lets take up this lifeline Come on,
    baby,
    gimme some sugar Is that the weight of the world on your back ? Surrender with that colorful flag Come on,
    baby,
    gimme some sugar Yeah,
    theyve been selling us this fiction as fact But I dont wanna lose you again Come on,
    baby,
    gimme some sugar Dont make me wait (dont make me wait) Dont make me wait too long (dont make me wait too long) Dont make sing the sad song Come on,
    baby,
    gimme some sugar Dont make me wait (dont make me wait) Dont make me wait too long (dont make me wait too long) Dont make sing the sad song Come on,
    baby,
    gimme some sugar All the shit they try to feed us Dont drink the poison
    or theyll defeat us This is the right time Come on,
    baby,
    gimme some sugar Dont break my heart,
    dont break my flow now
    And all this rage has got to
go now Lets take up this lifeline Come on,
    baby,
    gimme some sugar Dont make me wait (dont make me wait) Dont make me wait too long (dont make me wait too long) Dont make sing the sad song Come on,
    baby,
    gimme some sugar Dont make me wait (dont make me wait) Dont make me wait too long (dont make me wait too long) Dont make sing the sad song Come on,
    baby,
    gimme some sugar Dont make me wait Dont make me wait too long Dont make sing the sad song Come on,
    baby,
    gimme some sugar Dont make me wait (dont make me wait) Dont make me wait too long (dont make me wait too long) Dont make sing the sad song Come on,
    baby,
    gimme some sugar Dont make me wait Dont make me wait too long Dont make sing the sad song Come on,
    baby,
    gimme some sugar Dont make me wait Dont make me wait too long Dont make sing the sad song Come on,
    baby,
    gimme some sugar Dont make me wait Come on,
    baby,
    gimme some sugar '
    ),
    (
        ' To Be Alone with You ',
        ' Sufjan Stevens ',
        ' Seven Swans ',
        ' 2004 03 16 ',
        ' Folk ',
        ' I d swim across Lake Michigan I d sell my shoes I d give my body to be back again In the rest of the room To be alone with you To be alone with you To be alone with you To be alone with you You gave your body to the lonely They took your clothes You gave up a wife
    and a family You gave your ghost To be alone with me To be alone with me To be alone with me You went up on a tree Aah,
    aah,
    aah To be alone with me You went up on the tree Aah,
    aah,
    aah I ve never known a man who loved me Aah,
    aah,
    aah '
    ),
    (
        ' For the Widows in Paradise,
    for the Fatherless in Ypsilanti ',
        ' Sufjan Stevens ',
        ' Michigan ',
        ' 2003 07 01 ',
        ' Indie Folk ',
        ' I have called you,
    children I have called you,
    son What is there to answer If I m the only one Morning comes in Paradise Morning comes in light Still I must obey Still I must invite If there s anything to say If there s anything to do I there s any other way I ll do anything for you I was dressed in embarrassment I was dressed in white If you had a part of me Will you take your time Even if I come back Even if I die Is there some idea To replace my life Like a father to impress Like a mother s mourning dress If we ever make a mess I ll do anything for you I have called you,
    preacher I have called you,
    son If you have a father
    Or if you haven t one I ll do anything for you I ll do anything for you I ll do anything for you I ll do anything for you I did everything for you I did everything for you I did everything for you I did everything for you I did everything for you I did everything for you I did everything for you I did everything for you '
    );