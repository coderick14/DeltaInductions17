### Delta Inductions 2017
---
> Welcome to Delta Inductions 2017.

Hi. I'm Deep. :)
All the code that you have written or will write during the induction process should be pushed to **this repository**.

Here are a few tips to get you started.
- Create an account on [github](https://github.com). (In case you already don't have one)

- Install *git*. Click [here](https://git-scm.com/download/) to download and install git. (In case, you haven't installed it already)
- **Great!!**. So I assume that you've installed *git*, and you're ready to go ahead. If not, please install it before proceeding further, so that we can take one step at a time. **:)**
- Now, you need to configure your account details. Windows users, open git bash(Right click and click on '*Git Bash here*'). Linux guys, just open your *terminal*.
- Now type the following two commands. (*If you've already executed these commands before, there's no need to do it again*)  
`git config --global user.email <your-email-here>`  
`git config --global user.name <your-github-handle>`
- Now go to directory/folder where you want to keep your code. Check out the example below.
`cd ~/Documents/Code` or `cd ~/Desktop/MyFolder/`
On Windows, you can open the folder in File Explorer, and open *Git Bash* right there (by right clicking).
- Type `git clone https://github.com/coderick14/DeltaInductions17`
This will clone this repository in your system.
- Type `cd DeltaInductions17`
- What I'm about to say now is **REALLY IMPORTANT**. *Git* is a version control system. So that you can maintain different versions of your code/project. Now, all of you will submit different codes for the same task(s). Thus, we will have different versions of the same task(s). *Git* uses **branches** to maintain versions. So, each one of us will have a different branch here.
- The default branch is `master`. To create your own branch, type `git checkout -b <your-branch-name>`. For example, I'll type `git checkout -b deep`.
- **Awesome**. So now you're in your branch. At any point of time, you can check your current branch by typing `git branch`.
- Organize your tasks into subfolders i.e. Task1, Task2 ...
- You can keep working on your tasks now. Once you feel that you've reached a checkpoint and you want your changes to be saved, type the following commands.

1.`git status` ---> *This will show you what files you have [changed](https://www.atlassian.com/git/tutorials/inspecting-a-repository#git-status)*. This command is optional, but **highly recommended**.

2.`git add --all` ---> *This will push your code to [staging area](https://www.atlassian.com/git/tutorials/saving-changes#git-add)*.

3.`git commit -m <your-commit-message-within-quotes>` ---> [Commit](https://www.atlassian.com/git/tutorials/saving-changes#git-commit) your changes. Commit message tells what changes you've made, for example, `git commit -m "Add feature to edit notes"`. Try to keep them short and meaningful. :)

4.And finally, [push](https://www.atlassian.com/git/tutorials/syncing#git-push) your changes to Github using `git push origin <your-branch-name>`.
For example, I would type `git push origin deep`.
- **So whenever you feel that you've reached a checkpoint, type the four commands above. And you're good to go.**
- **MOST IMPORTANTLY, NEVER PUSH TO SOMEONE ELSE'S BRANCH. IF NECESSARY, TYPE `git branch` BEFORE ADDING YOUR CHANGES**. If you're on a diffrent branch (unlikely), type `git checkout <your-branch-name>` to switch to your branch.
> All the best guys. And Happy Coding!!
