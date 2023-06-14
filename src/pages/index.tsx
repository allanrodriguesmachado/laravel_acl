import {api} from '@/services/api';
import {convertDurationToTimeString} from '@/utils/convertDurationToTimeString';
import Head from 'next/head'
import {format, parseISO} from 'date-fns';
import ptBR from 'date-fns/locale/pt-BR';
import {GetStaticProps} from 'next';
import {Inter} from 'next/font/google';
import Image from 'next/image';

import styles from './home.module.scss';

const inter = Inter({subsets: ['latin']});

type EpisodesPodcast = {
    id: string;
    title: string;
    thumbnail: string;
    members: string;
    duration: number;
    durationAsString: string;
    url: string;
    publishedAt: string;
}

type HomePropsPodcast = {
    lastEpisodes: EpisodesPodcast;
    allEpisodes: EpisodesPodcast;
}

export default function Home({lastEpisodes, allEpisodes}: HomePropsPodcast) {
    return (
        <>
            <Head>
                <title>Podcast Dev</title>
            </Head>

            <div className={styles.homePage}>


                <section className={styles.latestEpisodes}>
                    <h2>últimos lançamentos</h2>
                    <ul>
                        {lastEpisodes.map(episode => {
                            return (
                                <li key={episode.id}>
                                    <Image
                                        style={{objectFit: "cover"}}
                                        width={192}
                                        height={192}
                                        src={episode.thumbnail}
                                        alt={episode.title}
                                    />

                                    <div className={episode.episodesDetails}>
                                        <a href="">{episode.title}</a>
                                        <p>{episode.members}</p>
                                        <span>{episode.publishedAt}</span>
                                        <span>{episode.durationAsString}</span>
                                    </div>


                                    <button type="button">
                                        <img src="/play-green.svg" alt="Tocar episodio"/>
                                    </button>

                                </li>
                            )
                        })}
                    </ul>
                </section>

                <section className={styles.allEpisodes}>

                </section>
            </div>
        </>
    )
}

export const getStaticProps: GetStaticProps = async () => {
    const {data} = await api.get('episodes', {
        params: {
            _limit: 12,
            _sort: 'published_at',
            _order: 'desc'
        }
    })

    const episodes = data.map((episode: {
        id: number,
        title: string,
        thumbnail: string,
        members: string,
        published_at: string,
        file: { duration: number, url: string }
    }) => {
        return {
            id: episode.id,
            title: episode.title,
            thumbnail: episode.thumbnail,
            members: episode.members,
            publishedAt: format(parseISO(episode.published_at), 'd MMM yy', {locale: ptBR}),
            durationAsString: convertDurationToTimeString({duration: episode.file.duration}),
            duration: Number(episode.file.duration),
            url: episode.file.url
        }
    })

    return {
        props: {
            lastEpisodes: episodes.slice(0, 2),
            allEpisodes: episodes.slice(2, episodes.length)
        },
        revalidate: 60 * 60 * 8
    }
}