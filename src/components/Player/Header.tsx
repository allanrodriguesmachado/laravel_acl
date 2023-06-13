interface HeaderProps {
    playingNow: string;
    playingImage: string;
}

export function Header({playingNow, playingImage}: HeaderProps) {
    return (
        <header>
            <img src={playingImage} alt={playingNow}/>
            <strong>{playingNow}</strong>
        </header>
    )
}