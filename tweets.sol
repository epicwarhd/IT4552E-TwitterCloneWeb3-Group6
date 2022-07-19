// SPDX-License-Identifier: MIT

pragma solidity ^0.8.7;

contract tweets {
    address public owner;
    uint256 private counter;

    constructor() {
        counter = 0;
        owner = msg.sender;
    }

    struct comment {
        address commenter;
        string commentTxt;
        string commentImg;
    }

    struct tweet {
        address creator; //nguoi tao tweet dau tien -> de khi retweet biet retweet tu ai
        address tweeter;
        uint256 id;
        string tweetTxt;
        string tweetImg;
        uint256 date;
        uint256 countStarred;
        comment[] comments;
    }

    event tweetCreated(
        address tweeter,
        address creator,
        uint256 id,
        string tweetTxt,
        string tweetImg
    );

    mapping(uint256 => tweet) Tweets;
    mapping(address => mapping(uint256 => bool)) starred;

    function setDate(uint256 id, uint256 _date) public {
        require(id < counter, "No such Tweet");
        tweet storage t = Tweets[id];
        t.date = _date;
    }

    function getDate(uint256 id) public view returns (uint256) {
        require(id < counter, "No such Tweet");
        tweet storage t = Tweets[id];

        return t.date;
    }

    function unStar(uint256 id) public {
        require(id < counter, "No such Tweet");
        require(starred[msg.sender][id] == true);
        tweet storage t = Tweets[id];
        t.countStarred--;
        starred[msg.sender][id] = false;
    }

    function star(uint256 id) public {
        require(id < counter, "No such Tweet");
        require(starred[msg.sender][id] == false);
        tweet storage t = Tweets[id];
        t.countStarred++;
        starred[msg.sender][id] = true;
    }

    function addComment(
        string memory commentTxt,
        string memory commentImg,
        uint256 id
    ) public {
        require(id < counter, "No such Tweet");

        tweet storage t = Tweets[id];
        comment memory cm;
        cm.commenter = msg.sender;
        cm.commentImg = commentImg;
        cm.commentTxt = commentTxt;
        t.comments.push(cm);
    }

    function getComment(uint256 id) public view returns (comment[] memory) {
        tweet storage t = Tweets[id];
        return t.comments;
    }

    function reTweet(uint256 id) public payable {
        //thuc chat la tao tweet moi voi creator la nguoi chu tweet
        require(msg.value >= (1 ether), "Please submit 1 Ether");
        require(id < counter, "No such Tweet");

        tweet storage t = Tweets[id];
        tweet storage newTweet = Tweets[counter];
        newTweet.tweetTxt = t.tweetTxt;
        newTweet.tweetImg = t.tweetImg;
        newTweet.tweeter = msg.sender;
        newTweet.creator = t.creator;
        newTweet.id = counter;
        emit tweetCreated(
            msg.sender,
            msg.sender,
            counter,
            t.tweetTxt,
            t.tweetImg
        );
        counter++;

        payable(owner).transfer(msg.value);
    }

    function addTweet(string memory tweetTxt, string memory tweetImg)
        public
        payable
    {
        require(msg.value >= (1 ether), "Please submit 1 Ether");

        tweet storage newTweet = Tweets[counter];
        newTweet.tweetTxt = tweetTxt;
        newTweet.tweetImg = tweetImg;
        newTweet.tweeter = msg.sender;
        newTweet.creator = msg.sender;
        newTweet.id = counter;
        emit tweetCreated(msg.sender, msg.sender, counter, tweetTxt, tweetImg);
        counter++;

        payable(owner).transfer(msg.value);
    }

    function contains(string memory what, string memory where)
        internal
        pure
        returns (bool)
    {
        bytes memory whatBytes = bytes(what);
        bytes memory whereBytes = bytes(where);

        if (whereBytes.length < whatBytes.length) return false;

        bool found = false;
        for (uint256 i = 0; i <= whereBytes.length - whatBytes.length; i++) {
            bool flag = true;
            for (uint256 j = 0; j < whatBytes.length; j++)
                if (whereBytes[i + j] != whatBytes[j]) {
                    flag = false;
                    break;
                }
            if (flag) {
                found = true;
                break;
            }
        }
        return found;
    }

    //searchTweet tra ve 1 list ID cac tweet co chua chuoi txt -> dung getTweet de lay tung tweet
    function searchTweet(string memory txt)
        public
        view
        returns (uint256[] memory)
    {
        tweet storage t;
        uint256 count = 0;
        for (uint256 i = 0; i < counter; i++) {
            t = Tweets[i];
            if (contains(txt, t.tweetTxt)) {
                count++;
            }
        }
        uint256[] memory listTweet = new uint256[](count);
        uint256 c = 0;
        for (uint256 i = 0; i < counter; i++) {
            t = Tweets[i];
            if (contains(txt, t.tweetTxt)) {
                listTweet[c] = i;
                c++;
            }
        }
        return listTweet;
    }

    function getTweet(uint256 id)
        public
        view
        returns (
            string memory,
            string memory,
            address,
            uint256
        )
    {
        require(id < counter, "No such Tweet");

        tweet storage t = Tweets[id];
        return (t.tweetTxt, t.tweetImg, t.tweeter, t.countStarred);
    }

    function getListTweet()
        public
        view
        returns (
            string[] memory,
            string[] memory,
            address[] memory,
            uint256[] memory
        )
    {
        string[] memory listTweetTxt = new string[](counter);
        string[] memory listTweetImg = new string[](counter);
        address[] memory listTweeter = new address[](counter);
        uint256[] memory listCountStarred = new uint256[](counter);
        for (uint256 i = 0; i < counter; i++) {
            listTweetTxt[i] = Tweets[i].tweetTxt;
            listTweetImg[i] = Tweets[i].tweetImg;
            listTweeter[i] = Tweets[i].tweeter;
            listCountStarred[i] = Tweets[i].countStarred;
        }
        return (listTweetTxt, listTweetImg, listTweeter, listCountStarred);
    }
}
